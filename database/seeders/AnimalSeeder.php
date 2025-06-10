<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Owner;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        Animal::truncate();

        Animal::factory()->count(10)->create()->each(function (Animal $animal) {
            $animal->owner_id = Owner::pluck('id')->random();
            $animal->save();
        });
    }
}
