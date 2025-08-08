<?php

namespace Src\Cart\Actions;

use Src\Catalog\Models\Listing;
use Illuminate\Support\Collection;

class ViewCartAction
{
    public function __invoke(): array
    {
        $cartItems = session()->get('cart', []);
        $listingIds = array_keys($cartItems);

        // Завантажуємо всі моделі Listing, які є в кошику, одним запитом
        $listings = Listing::with('product.brand') // Eager load для оптимізації
                           ->whereIn('id', $listingIds)
                           ->get()
                           ->keyBy('id');

        $totalPrice = 0;
        $cartContent = new Collection();

        foreach ($cartItems as $listingId => $item) {
            // Перевіряємо, чи існує такий товар (можливо, його видалили, поки він був у кошику)
            if (isset($listings[$listingId])) {
                $listing = $listings[$listingId];
                $quantity = $item['quantity'];
                $subtotal = $listing->price * $quantity;
                $totalPrice += $subtotal;

                $cartContent->push([
                    'listing' => $listing,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal,
                ]);
            }
        }

        return [
            'cartContent' => $cartContent,
            'totalPrice' => $totalPrice,
        ];
    }
}