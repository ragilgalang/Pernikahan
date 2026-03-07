<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name' => fake()->company(),
        'category' => fake()->randomElement(['Hotel', 'Gedung', 'Outdoor']),
        'location' => fake()->city(),
        'price' => fake()->numberBetween(5000000, 50000000),
        'capacity' => fake()->numberBetween(100, 1000),
        'description' => fake()->sentence(),
        ];
    }
}
