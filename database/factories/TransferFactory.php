<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transfer>
 */
class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::pluck('id')->random(),
            'materials_check' => fake()->boolean(),
            'cash_before' => $cash = fake()->numberBetween(0, 1000),
            'cash_after' => $cash,
            'km_start' => fake()->numberBetween(0, 10000),
            'km_end' => fake()->numberBetween(0, 10000),
            'is_done' => true,
        ];
    }
}
