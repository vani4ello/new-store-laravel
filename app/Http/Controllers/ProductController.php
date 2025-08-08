<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Src\Catalog\Actions\GetAllProductsAction;
use Src\Catalog\Actions\ShowProductAction; // <-- Додаємо use
use Src\Catalog\Models\Product;            // <-- Додаємо use для моделі

class ProductController extends Controller
{
    /**
     * Відображає сторінку каталогу з усіма товарами.
     */
    public function index(GetAllProductsAction $action): View
    {
        $products = $action();
        return view('products.index', compact('products'));
    }

    /**
     * Відображає сторінку одного конкретного товару.
     */
    public function show(Product $product, ShowProductAction $action): View
    {
        // $product автоматично знаходиться по :slug завдяки Route Model Binding
        $data = $action($product);

        return view('products.show', $data);
    }
}