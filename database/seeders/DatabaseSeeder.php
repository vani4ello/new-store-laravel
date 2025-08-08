<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Src\Catalog\Models\Brand;
use Src\Catalog\Models\Category;
use Src\Catalog\Models\Listing;
use Src\Catalog\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Крок 1: Створюємо все, що не залежить одне від одного
        User::factory()->create(['name' => 'Test User', 'email' => 'test@example.com']);
        $brands = Brand::factory(10)->create();
        $categories = Category::factory(15)->create();

        // Крок 2: Створюємо товари. Поки що без зв'язків.
        $products = Product::factory(50)->create();

        // Крок 3: Тепер, коли все створено, проходимо по товарах і додаємо зв'язки
        $user = User::first(); // Отримуємо нашого створеного користувача

        foreach ($products as $product) {
            // Присвоюємо бренд
            $product->brand_id = $brands->random()->id;
            $product->save();

            // Прикріплюємо категорії
            $product->categories()->attach($categories->random(rand(1, 3))->pluck('id'));

            // Створюємо пропозиції
            Listing::factory(rand(1, 2))->create([
                'product_id' => $product->id,
                'user_id' => $user->id,
            ]);
        }
    }
}