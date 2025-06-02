<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Caller>
 */
class CallerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'caller_name' => fake()->name(),
            'caller_phone_number' => fake()->phoneNumber(),
            'street_name' => fake()->streetName(),
            'house_number' => fake()->numberBetween(1, 1000),
            'postal_code' => fake()->postcode(),
            'city' => fake()->city(),
            'municipality' => fake()->city(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
