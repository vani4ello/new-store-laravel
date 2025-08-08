<?php

namespace Src\Cart\Actions;

use Illuminate\Http\Request;
use Src\Catalog\Models\Listing;

class AddToCartAction
{
    public function __invoke(Request $request): void
    {
        $request->validate([
            'listing_id' => ['required', 'exists:listings,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $listingId = $request->input('listing_id');
        $quantity = (int) $request->input('quantity');

        // Отримуємо поточний кошик з сесії, або створюємо пустий масив
        $cart = session()->get('cart', []);

        // Якщо такий товар вже є в кошику - просто збільшуємо кількість
        if (isset($cart[$listingId])) {
            $cart[$listingId]['quantity'] += $quantity;
        } else {
            // Якщо товару немає - додаємо його
            $cart[$listingId] = [
                'listing_id' => $listingId,
                'quantity' => $quantity,
            ];
        }

        // Зберігаємо оновлений кошик назад в сесію
        session()->put('cart', $cart);
    }
}