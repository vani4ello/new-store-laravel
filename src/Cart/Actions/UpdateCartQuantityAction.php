<?php

namespace Src\Cart\Actions;

use Illuminate\Http\Request;

class UpdateCartQuantityAction
{
    public function __invoke(Request $request): void
    {
        $request->validate([
            'listing_id' => ['required', 'exists:listings,id'],
            'quantity' => ['required', 'integer', 'min:1', 'max:100'], // Додамо max для безпеки
        ]);

        $listingId = $request->input('listing_id');
        $quantity = (int) $request->input('quantity');

        $cart = session()->get('cart', []);

        // Якщо товар існує в кошику, оновлюємо його кількість
        if (isset($cart[$listingId])) {
            $cart[$listingId]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);
    }
}