<?php

namespace Src\Catalog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Src\Catalog\Models\Brand;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition(): array
    {
        // Генеруємо одну унікальну назву компанії англійською
        $name = $this->faker->unique()->company;

        return [
            'name' => [
                'en' => $name,
                'uk' => 'Бренд ' . $name, // Робимо простий переклад для тестування
            ],
            'slug' => Str::slug($name),
            'description' => [
                'en' => $this->faker->paragraph,
                'uk' => $this->faker->realText(200), // Генеруємо різний текст для різних мов
            ],
        ];
    }
}