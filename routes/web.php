<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
// Підключаємо нові контролери
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;


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
// --- Маршрути Оформлення Замовлення (Checkout) ---
Route::get('/checkout', [OrderController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success/{order}', [OrderController::class, 'success'])->name('checkout.success');



// --- Маршрути Аутентифікації ---
Route::get('/auth', [AuthController::class, 'create'])->middleware('guest')->name('auth');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


// --- Маршрути Особистого кабінету (НОВА, ПОВНА ВЕРСІЯ) ---
Route::prefix('account')
    ->middleware('auth')
    ->name('account.')
    ->group(function () {
        // Головна сторінка кабінету буде показувати замовлення
        Route::get('/', [AccountController::class, 'orders'])->name('index');

        // Маршрути для профілю
        Route::get('/profile', [AccountController::class, 'profile'])->name('profile');
        Route::patch('/profile', [AccountController::class, 'updateProfile'])->name('profile.update');
        Route::put('/password', [AccountController::class, 'updatePassword'])->name('password.update');
        Route::delete('/profile', [AccountController::class, 'destroy'])->name('profile.destroy');

        // Маршрути для замовлень
        Route::get('/orders', [AccountController::class, 'orders'])->name('orders');
        Route::get('/orders/{order}', [AccountController::class, 'showOrder'])->name('orders.show');
    });

