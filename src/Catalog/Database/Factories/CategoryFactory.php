<?php

namespace Src\Catalog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Src\Catalog\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->jobTitle;

        return [
            'name' => [
                'en' => $name,
                'uk' => 'Категорія ' . $name,
            ],
            'slug' => Str::slug($name),
            'description' => [
                'en' => $this->faker->paragraph,
                'uk' => $this->faker->realText(200),
            ],
            'is_featured' => $this->faker->boolean(30),
            'status' => 'active',
        ];
    }
}