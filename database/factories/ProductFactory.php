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
            'image_url' => fake()->imageUrl(),
            'color' => fake()->colorName(),
            'type' => fake()->randomElement(['Beer', 'Leeuw', 'Hond', 'Poes', 'Olifant', 'Engels', 'Meisje', 'Knuffel']),
            'category' => fake()->numberBetween(1, 3),
            'price' => fake()->randomFloat(2, 10, 100),
        ];
    }
}
