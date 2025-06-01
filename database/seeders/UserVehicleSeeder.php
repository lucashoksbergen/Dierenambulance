<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserVehicle;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class UserVehicleSeeder extends Seeder
{
    public function run(): void
    {
        $vehicles = Vehicle::all();
        $drivers = User::whereHas('roles', function ($query) {
            $query->where('name', 'driver');
        })->get();

        foreach ($drivers as $driver) {
            $assignedVehicles = collect(
                $vehicles->random(min(3, $vehicles->count()))
            );

            foreach ($assignedVehicles as $vehicle) {
                UserVehicle::updateOrCreate(
                    [
                        'user_id' => $driver->id,
                        'vehicle_id' => $vehicle->id,
                    ],
                    [
                        'role' => collect(['driver', 'codriver'])->random(),
                    ]
                );
            }
        }
    }
}
