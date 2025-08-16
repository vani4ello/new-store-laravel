<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Src\Catalog\Models\Brand;
use Src\Catalog\Models\Category;
use Src\Catalog\Models\Listing;
use Src\Catalog\Models\Product;
use Src\Catalog\Enums\ListingType;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Крок 1: Створюємо все, що не залежить одне від одного
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User']
        );
        
        $brands = Brand::factory(10)->create();
        $categories = Category::factory(15)->create();

        // Крок 2: Створюємо товари
        $products = Product::factory(50)->create();

        // Крок 3: Прив'язуємо дані та створюємо пропозиції
        $isFirstProduct = true;

        foreach ($products as $index => $product) {
            // Присвоюємо бренд
            $product->brand_id = $brands->random()->id;
            
            // Додаємо банерні типи для перших кількох товарів
            if ($index === 0) {
                $product->banner_type = 'premium';
                $product->regular_price = 5000; // 50.00 грн
            } elseif ($index === 1) {
                $product->banner_type = 'gold';
                $product->regular_price = 3000; // 30.00 грн
            } elseif ($index === 2) {
                $product->banner_type = 'silver';
                $product->regular_price = 2000; // 20.00 грн
            } else {
                $product->banner_type = 'none';
                $product->regular_price = rand(1000, 10000); // 10.00 - 100.00 грн
            }
            
            // Додаємо кількість продажів
            $product->sold_count = rand(0, 100);
            
            $product->save();

            // Прикріплюємо категорії
            $product->categories()->attach($categories->random(rand(1, 3))->pluck('id'));

            // Створюємо пропозиції
            $listingCount = rand(1, 2);

            if ($isFirstProduct) {
                Listing::factory()->create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'type' => ListingType::UNLIMITED->value,
                    'quantity' => 0,
                    'price' => 4000, // 40.00 грн (знижка від 50.00 грн)
                ]);
                $isFirstProduct = false;
                $listingCount--;
            }
            
            if ($listingCount > 0) {
                // Розраховуємо ціну зі знижкою, але не менше 100 копійок (1 грн)
                $discount = rand(500, min(2000, $product->regular_price - 1000));
                $storePrice = max(1000, $product->regular_price - $discount);
                
                Listing::factory()->create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'type' => ListingType::LIMITED->value,
                    'price' => $storePrice,
                ]);
            }
        }
    }
}