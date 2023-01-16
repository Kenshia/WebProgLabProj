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
        $category = ProductCategory::randomCategory();
        return [
            'name' => $this->faker->name(),
            'category' => $category->id,
            'detail' => $this->faker->text(),
            'price' => $this->faker->numberBetween(10, 100000) * 100,
            'image' => 'storage/DUMMY_IMAGE_' . strtoupper($category->name) . '_' .  (string)$this->faker->numberBetween(1, 3) . '.png'
        ];
    }
}
