<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Payment;
use App\Models\User;
use App\Models\Report;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();
        Vehicle::factory(3)->create();
        Report::factory(10)->create(
            [
                'animal_id' => Animal::factory(),
                'user_id' => User::factory(),
                'user_vehicle_id' => Vehicle::factory(),
                'payment_id' => Payment::factory(),
            ]
        );

        $vehicles = Vehicle::all();
        $users = User::all();

        DB::table('vehicle_swap')->insert([
            'user_vehicle_old' => $vehicles->random()->id,
            'user_vehicle_new' => $vehicles->random()->id,
            'materials_check' => true,
            'cash' => fake()->numberBetween(0, 1000),
        ]);

        foreach ($vehicles as $vehicle) {
            $driver = $users->random();
            $codriver = $users->where('id', '!=', $driver->id)->random();

            // Randomly set codriver_id to NULL
            $codriverId = fake()->boolean(30) ? null : $codriver->id;

            DB::table('user_vehicle')->insert([
                'user_id' => $driver->id,
                'user_codriver_id' => $codriverId,
                'vehicle_id' => $vehicle->id,
            ]);
        }
    }
}
