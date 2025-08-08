// src/Catalog/Actions/ShowProductAction.php

namespace Src\Catalog\Actions;

use Src\Catalog\Models\Product;

class ShowProductAction
{
    public function __invoke(Product $product): array
    {
        // Eager Loading для уникнення проблеми N+1
        $product->load('brand', 'category', 'listings');

        return [
            'product' => $product,
        ];
    }
}