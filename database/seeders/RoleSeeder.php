<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['driver', 'callcenter', 'admin'];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                [
                    'name' => $role
                ],
                // Timestamps if necessary, are automatically handled by the model
                // [
                //     'created_at' => now(),
                //     'updated_at' => now()
                // ]
            );
        }
    }
}
