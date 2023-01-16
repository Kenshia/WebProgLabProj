<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'category' => ProductCategory::randomCategoryId(),
            'detail' => $this->faker->text(),
            'price' => $this->faker->numberBetween(10, 100000) * 100,
            'image' => 'image' .  (string)$this->faker->numberBetween(1, 10) . 'png'
        ];
    }
}
