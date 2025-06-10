<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Creates users and fills the role_user pivot table with random entries
        RoleUser::truncate();
        User::truncate();

        User::factory()->count(10)->create()->each(function (User $user) {
            $randomRoles = Role::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $user->roles()->attach($randomRoles);
        });


        // DELETE THIS LATER, ONLY FOR TESTING PURPOSES

        $testUser = User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'street' => 'teststreet',
            'house_number' => '1',
            'postal_code' => '1234AB',
            'city' => 'testcity',
            'municipality' => 'testmunicipality',
            'remember_token' => null,
        ]);
        // Gives the test user all the roles in the role_user pivot table
        $testUser->roles()->syncWithoutDetaching([
            Role::where('name', 'driver')->first()->id,
            Role::where('name', 'callcenter')->first()->id,
            Role::where('name', 'admin')->first()->id,
        ]);
    }
}
