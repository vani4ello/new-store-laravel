<?php

namespace Src\Catalog\Actions;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Src\Catalog\Models\Product;

class GetAllProductsAction
{
    public function __invoke(): LengthAwarePaginator
    {
        // Отримуємо товари, одразу підвантажуючи їхні зв'язки,
        // щоб уникнути проблеми "N+1 запит".
        // Сортуємо за датою створення і розбиваємо на сторінки по 12 товарів.
        return Product::query()
            ->with(['brand', 'listings']) // Eager Loading
            ->latest()
            ->paginate(12);
    }
}