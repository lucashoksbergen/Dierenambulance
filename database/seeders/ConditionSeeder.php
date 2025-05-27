<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
