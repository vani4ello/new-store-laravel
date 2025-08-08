<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Src\Cart\Actions\AddToCartAction;
use Src\Cart\Actions\RemoveFromCartAction; // <-- Додаємо use
use Src\Cart\Actions\UpdateCartQuantityAction; // <-- Додаємо use
use Src\Cart\Actions\ViewCartAction;

class CartController extends Controller
{
    public function add(Request $request, AddToCartAction $action): RedirectResponse
    {
        $action($request);
        return redirect()->back()->with('success', 'Товар успішно додано до кошика!');
    }

    public function index(ViewCartAction $action): View
    {
        $data = $action();
        return view('cart.index', $data);
    }

    public function update(Request $request, UpdateCartQuantityAction $action): RedirectResponse
    {
        $action($request);
        return redirect()->route('cart.index')->with('success', 'Кількість товару оновлено.');
    }

    public function remove(Request $request, RemoveFromCartAction $action): RedirectResponse
    {
        $action($request);
        return redirect()->route('cart.index')->with('success', 'Товар видалено з кошика.');
    }
}