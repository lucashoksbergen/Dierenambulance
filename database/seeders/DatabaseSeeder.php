<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Creates roles, happens before users
        $this->call([
            RoleSeeder::class,
            ConditionSeeder::class,
                // Filling the tables with fake data, order is essential here
            UserSeeder::class,
            VehicleSeeder::class,
            UserVehicleSeeder::class,
            TransferSeeder::class,
            TransferUserVehicleSeeder::class,
            CallerSeeder::class,
            OwnerSeeder::class,
            AnimalSeeder::class,
            PaymentSeeder::class,
            ReportSeeder::class,
            ReportUserVehicleSeeder::class,
            AnimalConditionSeeder::class,
        ]);


    }

} 

