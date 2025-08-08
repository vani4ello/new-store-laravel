<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Маршрут для сторінки каталогу
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Маршрут для сторінки конкретного товару
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update'); // <-- Новий маршрут
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove'); // <-- Новий маршру