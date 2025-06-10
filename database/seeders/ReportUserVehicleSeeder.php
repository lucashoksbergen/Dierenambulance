<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\ReportUserVehicle;
use App\Models\UserVehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportUserVehicleSeeder extends Seeder
{

    public function run(): void
    {

        ReportUserVehicle::truncate();

        $userVehicles = UserVehicle::all();
        $reports = Report::all();

        foreach ($reports as $reportItem) {
            $driverUserVehicle = $userVehicles
                ->where('role', 'driver')
                ->random();
            ReportUserVehicle::updateOrCreate(
                [
                    'report_id' => $reportItem->id,
                    'user_vehicle_id' => $driverUserVehicle->id,
                ],
                [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
            $codriverUserVehicle = $userVehicles
                ->where('role', 'codriver')
                ->where('user_id', '!=', $driverUserVehicle->user_id)
                ->random();
            ReportUserVehicle::updateOrCreate(
                [
                    'report_id' => $reportItem->id,
                    'user_vehicle_id' => $codriverUserVehicle->id,
                ],
                [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
            // Ensures that each report has one driver and one codriver assigned.
        }

    }
}
