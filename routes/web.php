<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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