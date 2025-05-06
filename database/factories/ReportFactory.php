<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['dog', 'cat', 'other']),
            'date' => fake()->date(),
            'vehicle_volunteer_id' => '1',
            'call_taker' => '1',
            'caller_name' => fake()->name(),
            'caller_phone_number' => fake()->phoneNumber(),
            'description' => fake()->text(),
            'street_name' => fake()->streetName(),
            'house_number' => fake()->numberBetween(1, 100),
            'postal_code' => fake()->postcode(),
            'city' => fake()->city(),
            'municipality' => fake()->city(),
            'animal_id' => '1',
            'report_status' => fake()->randomElement(['open', 'closed']),
            'rijkswaterstaat_called' => fake()->boolean(),
            'payment_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
