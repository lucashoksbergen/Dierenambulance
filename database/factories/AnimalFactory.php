<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => Owner::factory(),
            'condition' => fake()->randomElement(['hurt', 'healthy', 'sick', 'dead', 'stray', 'young', 'unknown']),
            'type' => fake()->randomElement(['dog', 'cat', 'bird', 'other']),
            'race' => fake()->word(),
            'gender' => fake()->randomElement(['male', 'female', 'neutered', 'unknown']),
            'description' => fake()->sentence(),
            'chip_number' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'registered' => fake()->boolean(),
            'registered_at' => fake()->city(),
        ];
    }
}
