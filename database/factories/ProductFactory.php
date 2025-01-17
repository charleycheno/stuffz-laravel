<?php

namespace Database\Factories;

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
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'image_url' => fake()->imageUrl(),
            'color' => fake()->colorName(),
            'size' => fake()->randomElement(['S', 'M', 'L']),
            'type' => fake()->randomElement(['Wild', 'Pet', 'Seasonal']),
            'price' => fake()->randomFloat(2, 10, 100),
        ];
    }
}
