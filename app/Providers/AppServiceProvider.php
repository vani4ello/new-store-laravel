<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // <-- 1. Підключаємо фасад View
use App\Http\View\Composers\CartComposer; // <-- 2. Підключаємо наш новий Composer

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 3. Реєструємо Composer, щоб він працював на всіх сторінках
        View::composer('*', CartComposer::class);
    }
}