<?php

namespace Src\Catalog\Actions;

use Src\Catalog\Models\Product;

class ShowProductAction
{
    /**
     * Завантажує товар разом з його зв'язками для відображення на сторінці.
     *
     * @param Product $product
     * @return array
     */
    public function __invoke(Product $product): array
    {
        // Eager Loading для уникнення проблеми N+1
        // Змінюємо 'category' на 'categories'
        $product->load('brand', 'categories', 'listings');

        return [
            'product' => $product,
        ];
    }
}