<?php

namespace Src\Cart\Actions;

use Illuminate\Http\Request;

class RemoveFromCartAction
{
    public function __invoke(Request $request): void
    {
        $request->validate([
            'listing_id' => ['required', 'exists:listings,id'],
        ]);

        $listingId = $request->input('listing_id');

        $cart = session()->get('cart', []);

        // Видаляємо елемент з масиву кошика
        unset($cart[$listingId]);

        session()->put('cart', $cart);
    }
}