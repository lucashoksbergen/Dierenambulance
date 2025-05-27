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
            'owner_id' => null, // Is set in seeder, is also nullable
            'type' => fake()->randomElement(['dog', 'cat', 'bird', 'other']),
            'other_type' => fake()->optional()->word(), // Used if type is 'other'
            'breed' => fake()->word(),
            'gender' => fake()->randomElement(['male', 'female', 'ex-male', 'unknown']),
            'description' => fake()->sentence(),
            'chip_number' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'registered' => fake()->boolean(),
            'registered_at' => fake()->city(),
        ];
    }
}
