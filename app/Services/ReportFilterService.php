<?php

namespace App\Services;

use App\DTOs\ReportFilterData;
use App\Repositories\ReportFilterRepository;


class ReportFilterService
{

    public function __construct(protected ReportFilterRepository $reportFilterRepository)
    {
    }

    public function filterReports(ReportFilterData $dto)
    {
        return $this->reportFilterRepository->getFilteredReports($dto);
    }

}