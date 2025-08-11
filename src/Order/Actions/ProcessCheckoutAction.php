<?php

namespace Src\Order\Actions;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RuntimeException;
use Src\Catalog\Models\Listing;
use Src\Order\DTO\NewOrderDTO;
use Src\Order\Enums\OrderStatus;
use Src\Order\Models\Order;
use Src\Order\Models\OrderItem;
use App\Models\User;

class ProcessCheckoutAction
{
    /**
     * Handle checkout: create/find user, create order and items, update stock, clear cart.
     */
    public function __invoke(NewOrderDTO $dto): Order
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            throw new RuntimeException('Cart is empty.');
        }

        // Create or find user by email
        $user = User::firstOrCreate(
            ['email' => $dto->customer_email],
            [
                'name' => $dto->customer_name,
                'password' => Hash::make($dto->password),
            ]
        );

        return DB::transaction(function () use ($cart, $user, $dto): Order {
            $listingIds = array_keys($cart);

            // Lock listings for update to prevent race conditions
            $listings = Listing::query()
                ->with(['product.brand'])
                ->whereIn('id', $listingIds)
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            if ($listings->isEmpty()) {
                throw new RuntimeException('Listings not found.');
            }

            // Pre-calc total
            $totalPrice = 0;
            foreach ($cart as $listingId => $item) {
                $listing = $listings->get((int) $listingId);
                if (!$listing) {
                    throw new RuntimeException("Listing {$listingId} not found.");
                }

                $quantity = (int) ($item['quantity'] ?? 0);
                if ($quantity <= 0) {
                    throw new RuntimeException('Invalid quantity.');
                }

                // If limited, ensure enough stock
                $typeRaw = $listing->getRawOriginal('type'); // bypass enum cast mismatch
                if ($typeRaw === 'limited') {
                    if ($listing->quantity < $quantity) {
                        throw new RuntimeException("Insufficient stock for listing {$listing->id}.");
                    }
                }

                $totalPrice += (int) $listing->price * $quantity;
            }

            // Create order
            $order = Order::create([
                'user_id' => $user->id,
                'status' => OrderStatus::NEW,
                'total_price' => $totalPrice,
                'customer_name' => $dto->customer_name,
                'customer_email' => $dto->customer_email,
                'customer_phone' => '', // not collected on form yet
                'delivery_address' => null,
                'delivery_method' => null,
                'notes' => null,
            ]);

            // Create order items and update stock
            foreach ($cart as $listingId => $item) {
                $listing = $listings->get((int) $listingId);
                $quantity = (int) ($item['quantity'] ?? 0);

                $product = $listing->product;
                $brand = $product?->brand;

                $productName = method_exists($product, 'getTranslation')
                    ? $product->getTranslation('name', app()->getLocale())
                    : (string) $product->name;

                $brandName = $brand && method_exists($brand, 'getTranslation')
                    ? $brand->getTranslation('name', app()->getLocale())
                    : ($brand?->name ?? null);

                OrderItem::create([
                    'order_id' => $order->id,
                    'listing_id' => $listing->id,
                    'product_name' => (string) $productName,
                    'brand_name' => $brandName ? (string) $brandName : null,
                    'price_per_item' => (int) $listing->price,
                    'quantity' => $quantity,
                ]);

                $typeRaw = $listing->getRawOriginal('type');
                if ($typeRaw === 'limited') {
                    // Double-check and decrement
                    if ($listing->quantity < $quantity) {
                        throw new RuntimeException("Insufficient stock for listing {$listing->id}.");
                    }
                    $listing->decrement('quantity', $quantity);
                }
            }

            // Clear cart
            session()->forget('cart');

            return $order;
        });
    }
}
