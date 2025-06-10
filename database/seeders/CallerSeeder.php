<?php

namespace Database\Seeders;

use App\Models\Caller;
use Illuminate\Database\Seeder;

class CallerSeeder extends Seeder
{
    public function run(): void
    {

        Caller::truncate();

        Caller::factory()->count(10)->create();
        
    }
}
