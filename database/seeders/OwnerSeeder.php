<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{

    public function run(): void
    {

        Owner::truncate();

        Owner::factory()->count(10)->create();
        
    }
}
