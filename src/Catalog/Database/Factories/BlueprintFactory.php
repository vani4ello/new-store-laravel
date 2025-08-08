<?php

namespace Src\Catalog\Database\Factories; // ВИПРАВЛЕНО

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Catalog\Models\Blueprint; // ВИПРАВЛЕНО

class BlueprintFactory extends Factory
{
    protected $model = Blueprint::class; // ВИПРАВЛЕНО

    public function definition(): array
    {
        return [
            // Поки що порожньо, ми заповнимо її, коли будемо реалізовувати логіку шаблонів
        ];
    }
}