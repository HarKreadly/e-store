<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = ProductCategory::inRandomOrder()->first();

        return [
            'name' => $this->faker->words(2, true),
            'slug' => Str::slug($this->faker->words(2, true) . '-' . $this->faker->unique()->numberBetween(1, 10000)),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 500),
            'stock' => $this->faker->numberBetween(0, 200),
            'product_category_id' => $category ? $category->id : null,
        ];
    }
}
