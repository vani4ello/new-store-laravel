<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
// Підключаємо нові контролери
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Головна сторінка ---
Route::get('/', [HomeController::class, 'index'])->name('home');


// --- Маршрути Каталогу Товарів ---
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');


// --- Маршрути Кошика (захищені auth middleware) ---
Route::prefix('cart')
    ->middleware('auth')
    ->name('cart.')
    ->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add', [CartController::class, 'add'])->name('add');
        Route::patch('/update', [CartController::class, 'update'])->name('update');
        Route::delete('/remove', [CartController::class, 'remove'])->name('remove');
    });


// --- Маршрути Оформлення Замовлення (Checkout) ---
Route::prefix('checkout')
    ->middleware('auth')
    ->name('checkout.')
    ->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::post('/', [OrderController::class, 'store'])->name('store');
        Route::get('/success/{order}', [OrderController::class, 'success'])->name('success');
    });


// --- Маршрути Аутентифікації ---
Route::get('/auth', [AuthController::class, 'create'])->middleware('guest')->name('auth');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


// --- Маршрути Особистого кабінету ---
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

