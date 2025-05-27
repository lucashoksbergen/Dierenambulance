<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Animal;
use App\Models\Caller;
use App\Models\Condition;
use App\Models\Owner;
use App\Models\Payment;
use App\Models\Report;
use App\Models\Role;
use App\Models\Transfer;
use App\Models\User;
use App\Models\UserVehicle;
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
        // Creates roles, happens before users
        $this->call([
            RoleSeeder::class,
            ConditionSeeder::class,
        ]);


        // Filling the tables with fake data

        // Creates users and fills the role_user pivot table with random entries
        DB::table('role_user')->truncate();
        User::factory()->count(10)->create()->each(function (User $user) {
            $randomRoles = Role::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $user->roles()->attach($randomRoles);
        });

        // Needs to be called after users are made
        $this->call([
            VehicleSeeder::class,
        ]);


        // Creates entries for the user_vehicle pivot table
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

        Transfer::factory()->count(10)->create();

        // Creates entries for the transfer / user_vehicle pivot tables
        $userVehicles = UserVehicle::all();
        $transfers = Transfer::all();
        foreach ($userVehicles as $userVehicleItem) {
            $oldRandomTransfers = collect($transfers->random(min(3, $transfers->count())));
            foreach ($oldRandomTransfers as $transferItem) {
                DB::table('transfer_old_user_vehicle')->updateOrInsert(
                    [
                        'user_vehicle_id' => $userVehicleItem->id,
                        'transfer_id' => $transferItem->id,
                    ],
                    [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
            $newRandomTransfers = collect($transfers->random(min(3, $transfers->count())));
            foreach ($newRandomTransfers as $transferItem) {
                DB::table('transfer_new_user_vehicle')->updateOrInsert(
                    [
                        'user_vehicle_id' => $userVehicleItem->id,
                        'transfer_id' => $transferItem->id,
                    ],
                    [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }

        // Creates callers
        Caller::factory()->count(10)->create();
        Owner::factory()->count(10)->create();
        Animal::factory()->count(10)->create()->each(function (Animal $animal) {
            $animal->owner_id = Owner::pluck('id')->random();
            $animal->save();
        });
        Payment::factory()->count(10)->create();

        // Reports, needs to be called after all other factories are run, so ids can be linked correctly
        Report::factory()->count(10)->create();


        // Creates entries for the report_user_vehicle pivot table
        $userVehicles = UserVehicle::all();
        $reports = Report::all();
        foreach ($userVehicles as $userVehicleItem) {
            $randomReports = collect($reports->random(min(3, $reports->count())));
            foreach ($randomReports as $reportItem) {
                DB::table('report_user_vehicle')->updateOrInsert(
                    [
                        'report_id' => $reportItem->id,
                        'user_vehicle_id' => $userVehicleItem->id,
                    ],
                    [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }

        // Create entries for the animal_condition pivot table
        $animals = Animal::all();
        $conditions = Condition::all();
        foreach ($animals as $animalItem) {
            $randomConditions = collect($conditions->random(min(2, $conditions->count())));
            foreach ($randomConditions as $conditionItem) {
                DB::table('animal_condition')->updateOrInsert(
                    [
                        'animal_id' => $animalItem->id,
                        'condition_id' => $conditionItem->id,
                    ],
                    [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }

    } // end of run method

} // end of class

