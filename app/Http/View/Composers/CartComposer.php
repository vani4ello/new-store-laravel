<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class CartComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $cartItems = session('cart', []);
        
        // Рахуємо не кількість унікальних позицій, а загальну кількість товарів
        $cartTotalQuantity = array_reduce($cartItems, function ($carry, $item) {
            return $carry + $item['quantity'];
        }, 0);

        $view->with('cartTotalQuantity', $cartTotalQuantity);
    }
}