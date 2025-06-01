<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Creates users and fills the role_user pivot table with random entries
        DB::table('role_user')->truncate();
        User::factory()->count(10)->create()->each(function (User $user) {
            $randomRoles = Role::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $user->roles()->attach($randomRoles);
        });
    }
}
