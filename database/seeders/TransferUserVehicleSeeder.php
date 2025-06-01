<?php

namespace Database\Seeders;

use App\Models\Transfer;
use App\Models\UserVehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransferUserVehicleSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('transfer_old_user_vehicle')->truncate();
        DB::table('transfer_new_user_vehicle')->truncate();

        $userVehicles = UserVehicle::all();
        $transfers = Transfer::all();
        foreach ($userVehicles as $userVehicleItem) {
            $oldRandomTransfers = collect($transfers->random(min(3, $transfers->count())));
            foreach ($oldRandomTransfers as $transferItem) {
                DB::table('transfer_old_user_vehicle')->updateOrInsert(
                    [
                        'user_vehicle_id' => $userVehicleItem->id,
                        'transfer_id' => $transferItem->id,
                    ],
                    [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
            $newRandomTransfers = collect($transfers->random(min(3, $transfers->count())));
            foreach ($newRandomTransfers as $transferItem) {
                DB::table('transfer_new_user_vehicle')->updateOrInsert(
                    [
                        'user_vehicle_id' => $userVehicleItem->id,
                        'transfer_id' => $transferItem->id,
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
