<?php

namespace Database\Seeders;

use App\Models\Caller;
use Illuminate\Database\Seeder;
use Schema;

class CallerSeeder extends Seeder
{
    public function run(): void
    {
        // Rerunning this seeder will create new callers that have matching ids to the callers linked in the reports table. Thus rerunning this seeder is not recommended if you have reports.
        Schema::disableForeignKeyConstraints();
        Caller::truncate();
        Schema::enableForeignKeyConstraints();

        Caller::factory()->count(10)->create();
        
    }
}
