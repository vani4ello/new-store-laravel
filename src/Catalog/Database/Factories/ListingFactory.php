<?php

namespace Src\Catalog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Catalog\Models\Listing;

class ListingFactory extends Factory
{
    protected $model = Listing::class;

    public function definition(): array
    {
        $type = $this->faker->randomElement(['limited', 'unlimited']);

        $quantity = $type === 'limited'
            ? $this->faker->numberBetween(1, 100)
            : 0;

        return [
            'price' => $this->faker->numberBetween(10000, 100000),
            'type' => $type,
            'quantity' => $quantity,
            'is_active' => true,
        ];
    }
}