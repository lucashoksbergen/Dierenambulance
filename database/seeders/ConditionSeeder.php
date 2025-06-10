<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionSeeder extends Seeder
{
    public function run(): void
    {

        Condition::truncate();
        $conditions = ['sick', 'stray', 'dead', 'young', 'weakened', 'injured', 'other'];

        foreach ($conditions as $condition) {
            Condition::firstOrCreate(
                [
                    'name' => $condition
                ],
            );
        }
    }
}
