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
        User::factory()->create(['name' => 'Test User', 'email' => 'test@example.com']);
        $brands = Brand::factory(10)->create();
        $categories = Category::factory(15)->create();

        // Крок 2: Створюємо товари
        $products = Product::factory(50)->create();

        // Крок 3: Прив'язуємо дані та створюємо пропозиції
        $user = User::firstOrFail();
        $isFirstProduct = true;

        foreach ($products as $product) {
            // Присвоюємо бренд
            $product->brand_id = $brands->random()->id;
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
                ]);
                $isFirstProduct = false;
                $listingCount--;
            }
            
            if ($listingCount > 0) {
                Listing::factory($listingCount)->create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'type' => ListingType::LIMITED->value,
                ]);
            }
        }
    }
}