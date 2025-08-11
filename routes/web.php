<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Головна сторінка ---
Route::get('/', function () {
    return view('welcome');
})->name('home');


// --- Маршрути Каталогу Товарів ---
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');


// --- Маршрути Кошика ---
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');


// --- Маршрути Оформлення Замовлення (Checkout) ---
// Вся логіка тепер об'єднана в OrderController для чистоти та консистентності

// Відображення сторінки оформлення замовлення
Route::get('/checkout', [OrderController::class, 'index'])->name('checkout.index'); // <-- ЦЕЙ РЯДОК ПОТРІБНО БУЛО ВИПРАВИТИ

// Обробка даних з форми та створення замовлення
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');

// Сторінка успішного створення замовлення ("Дякуємо за покупку")
Route::get('/checkout/success/{order}', [OrderController::class, 'success'])->name('checkout.success');