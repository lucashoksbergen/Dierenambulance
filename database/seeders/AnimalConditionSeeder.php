<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Condition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalConditionSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('animal_condition')->truncate();

        $animals = Animal::all();
        $conditions = Condition::all();
        foreach ($animals as $animalItem) {
            $randomConditions = collect($conditions->random(min(2, $conditions->count())));
            foreach ($randomConditions as $conditionItem) {
                DB::table('animal_condition')->updateOrInsert(
                    [
                        'animal_id' => $animalItem->id,
                        'condition_id' => $conditionItem->id,
                    ],
                    [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }
}
