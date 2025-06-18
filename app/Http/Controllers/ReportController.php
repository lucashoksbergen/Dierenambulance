<?php

namespace App\Http\Controllers;

use App\DTOs\ReportFilterData;
use App\Services\ReportFilterService;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function __construct(protected ReportFilterService $reportFilterService)
    {
    }

    public function index(Request $request)
    {

        $dto = ReportFilterData::fromRequest($request);

        $reports = $this->reportFilterService->filterReports($dto);

        return view('dashboard', compact('reports'));

    }

}
