<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\Caller;
use App\Models\Payment;
use App\Models\User;
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
            // Does not set the other ids used in this, this does occur in the seeder
            'type' => fake()->randomElement(['taxi', 'emergency']),
            'date' => fake()->date(),

            'report_status' => fake()->randomElement(['open', 'closed', 'in_progress']),

            'street_name' => fake()->streetName(),
            'house_number' => fake()->numberBetween(1, 1000),
            'postal_code' => fake()->postcode(),
            'city' => fake()->city(),
            'municipality' => fake()->city(),

            'rijkswaterstaat_called' => fake()->boolean(),

            'user_id' => User::pluck('id')->random(),
            'caller_id' => Caller::pluck('id')->random(),
            'animal_id' => Animal::pluck('id')->random(),
            'payment_id' => Payment::pluck('id')->random(),

            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
