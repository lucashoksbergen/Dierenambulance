<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Report;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();
        Report::factory(10)->create([
            'vehicle_volunteer_id' => 1,
            'call_taker' => 1,
            'animal_id' => 1,
            'payment_id' => 1,
        ]);
    }
}
