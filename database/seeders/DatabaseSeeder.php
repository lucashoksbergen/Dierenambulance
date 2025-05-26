<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Payment;
use App\Models\Role;
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

        // Creates users, roles and fills their pivot table with random entries
        DB::table('role_user')->truncate();

        // Creates the roles
        $this->call([
            RoleSeeder::class
        ]);

        User::factory(10)->create()->each(function (User $user) {
            $randomRoles = Role::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $user->roles()->attach($randomRoles);
        });

        // Creates vehicles
        Vehicle::factory(5)->create();

    }
}
