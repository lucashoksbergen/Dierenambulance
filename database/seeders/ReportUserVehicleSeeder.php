<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\UserVehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportUserVehicleSeeder extends Seeder
{

    public function run(): void
    {
        $userVehicles = UserVehicle::all();
        $reports = Report::all();
        foreach ($userVehicles as $userVehicleItem) {
            $randomReports = collect($reports->random(min(3, $reports->count())));
            foreach ($randomReports as $reportItem) {
                DB::table('report_user_vehicle')->updateOrInsert(
                    [
                        'report_id' => $reportItem->id,
                        'user_vehicle_id' => $userVehicleItem->id,
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
