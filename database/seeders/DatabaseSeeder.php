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

        User::factory(10)->create();
        Vehicle::factory(3)->create();

        Report::factory(10)->create(function () {
            return [
                'user_id' => User::inRandomOrder()->value('id'),
                // No duplicate protection between driver/codriver yet.
                'driver_id' => User::inRandomOrder()->value('id'),
                'codriver_id' => User::inRandomOrder()->value('id'),
                'vehicle_id' => Vehicle::inRandomOrder()->value('id'),
                'animal_id' => Animal::factory(),
                'payment_id' => Payment::factory(),
            ];
        });

        DB::table('vehicle_swap')->insert([
            'user_vehicle_old' => Vehicle::inRandomOrder()->value('id'),
            'user_vehicle_new' => Vehicle::inRandomOrder()->value('id'),
            'materials_check' => true,
            'cash' => fake()->numberBetween(0, 1000),
        ]);

    }
}
