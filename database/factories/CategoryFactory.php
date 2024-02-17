<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->currencyCode,
            'title' => fake()->jobTitle,
            'description' => fake()->text(120),
            'img' => '/storage/static/homePage/category-smartphone.png',
            'is_public' => fake()->boolean(true)
        ];
    }
}
