<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'street' => fake()->streetName(),
            'house_number' => fake()->numberBetween(1, 100),
            'postal_code' => fake()->postcode(),
            'city' => fake()->city(),
            'municipality' => fake()->city(),
        ];
    }
}
