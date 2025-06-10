<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {

        // PLANNED FUNCTIONALITIES:
        // Display different reports based on user logged in: drivers only see their own reports
        // Fix front-end, styling and positioning and such
        // Reset filter button
        // Keep filter form filled in after submitting
        // Pagination?
        // Instantly show updated results when filter form is filled in and submitted


        $query = Report::query();
        // Municipality
        if ($request->filled('municipality')) {
            $query->whereHas('animal.owner', function ($q) use ($request) {
                $q->where('municipality', $request->municipality);
            });
        }

        // Animal type
        if ($request->filled('animaltype')) {
            if ($request->animaltype === 'other' && $request->filled('othertype')) {
                $query->whereHas('animal', function ($q) use ($request) {
                    $q->where('type', 'other')->where('other_type', $request->othertype);
                });
            } else {
                $query->whereHas('animal', function ($q) use ($request) {
                    $q->where('type', $request->animaltype);
                });
            }
        }

        // Condition
        if ($request->filled('reporttype')) {
            $query->where('type', $request->reporttype);

        }

        // City
        if ($request->filled('city')) {
            $query->where('city', $request->city);
            // Or following code if filtering by animal owner city, currently filtering by place of report
            // $query->whereHas('animal.owner', function ($q) use ($request) {
            //     $q->where('city', $request->city);
            // });
        }

        // Date
        if ($request->filled('date')) {
            $query->whereDate('updated_at', $request->date);
        }

        // Status of report
        if ($request->filled('status')) {
            $query->where('report_status', $request->status);
        }

        $reports = $query->with(['animal.owner', 'animal.conditions'])->get();

        return view('dashboard', compact('reports'));

    }

}
