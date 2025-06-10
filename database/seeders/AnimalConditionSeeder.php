<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\AnimalCondition;
use App\Models\Condition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalConditionSeeder extends Seeder
{
    public function run(): void
    {

        AnimalCondition::truncate();

        $animals = Animal::all();
        $conditions = Condition::all();
        foreach ($animals as $animalItem) {
            $randomConditions = collect($conditions->random(min(2, $conditions->count())));
            foreach ($randomConditions as $conditionItem) {
                AnimalCondition::updateOrCreate(
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
