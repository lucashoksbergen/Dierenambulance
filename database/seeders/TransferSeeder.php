<?php

namespace Database\Seeders;

use App\Models\Transfer;
use Illuminate\Database\Seeder;

class TransferSeeder extends Seeder
{
    public function run(): void
    {
        Transfer::truncate();

        Transfer::factory()->count(10)->create();
    }
}
