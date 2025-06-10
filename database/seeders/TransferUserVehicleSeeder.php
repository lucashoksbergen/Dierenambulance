<?php

namespace Database\Seeders;

use App\Models\Transfer;
use App\Models\TransferNewUserVehicle;
use App\Models\TransferOldUserVehicle;
use App\Models\UserVehicle;
use Illuminate\Database\Seeder;

class TransferUserVehicleSeeder extends Seeder
{
    public function run(): void
    {

        TransferOldUserVehicle::truncate();
        TransferNewUserVehicle::truncate();

        $userVehicles = UserVehicle::all();
        $transfers = Transfer::all();
        foreach ($userVehicles as $userVehicleItem) {
            $oldRandomTransfers = collect($transfers->random(min(3, $transfers->count())));
            foreach ($oldRandomTransfers as $transferItem) {
                TransferOldUserVehicle::updateOrCreate(
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
                TransferNewUserVehicle::updateOrCreate(
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
