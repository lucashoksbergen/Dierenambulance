<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{

    public function run(): void
    {
        Payment::truncate();

        Payment::factory()->count(10)->create();

    }
}
