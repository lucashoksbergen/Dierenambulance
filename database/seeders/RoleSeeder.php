<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        Role::truncate();
        $roles = ['driver', 'callcenter', 'admin'];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                [
                    'name' => $role
                ],
            );
        }
    }
}
