<?php

namespace App\Repositories;

use App\DTOs\ReportFilterData;
use App\Models\Report;


class ReportFilterRepository
{

    public function getFilteredReports(ReportFilterData $dto)
    {
        $query = Report::query();

        // Municipality
        if ($dto->municipality) {
            $query->whereHas('animal.owner', function ($q) use ($dto) {
                $q->where('municipality', $dto->municipality);
            });
        }

        // Animal type
        if ($dto->animal_type) {
            $query->whereHas('animal', function ($q) use ($dto) {
                if ($dto->animal_type) {
                    $q->where('type', $dto->animal_type);
                }
                if ($dto->animal_type === 'other') {
                    $q->where('other_type', $dto->other_type);
                }

            });

        }

        // Condition
        if ($dto->report_type) {
            $query->where('type', $dto->report_type);

        }

        // City
        if ($dto->city) {
            $query->whereHas('animal.owner', function ($q) use ($dto) {
                $q->where('city', $dto->city);
            });
        }

        // Date
        if ($dto->date) {
            $query->whereDate('updated_at', $dto->date);
        }

        // Status of report
        if ($dto->status) {
            $query->where('report_status', $dto->status);
        }

        $query->with(['animal.owner', 'animal.conditions', 'userVehicles.user']);
        $paginated = $query->paginate($dto->pagination);
        $paginated->appends($dto->queryParameters);

        return $paginated;

    }

}