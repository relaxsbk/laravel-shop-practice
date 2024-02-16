<?php

namespace Database\Factories;

use App\Models\Brand;
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
        return [
            'category_id' => fake()->numberBetween(1, 12),
            'title' => fake()->jobTitle,
            'model' => fake()->title,
            'brand_id' => Brand::all()->random()->id, // Выбираем случайный brand_id из созданных брендов
            'description' => fake()->realText,
            'price' => fake()->numberBetween(1_000, 999_999),
            'quantity' => fake()->numberBetween(1, 15),
            'rating' => fake()->numberBetween(1, 5),
        ];
    }
}
