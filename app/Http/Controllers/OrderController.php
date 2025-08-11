<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckoutRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Src\Order\Actions\ProcessCheckoutAction;
use Src\Order\Models\Order;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('checkout.index');
    }

    public function store(StoreCheckoutRequest $request, ProcessCheckoutAction $action): RedirectResponse
    {
        $order = $action($request->toDto());

        auth()->loginUsingId($order->user_id);

        return redirect()->route('checkout.success', $order);
    }

    public function success(Order $order): View
    {
        if (auth()->id() !== $order->user_id) {
            abort(404);
        }

        return view('checkout.success', compact('order'));
    }
}