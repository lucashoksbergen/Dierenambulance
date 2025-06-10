<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {

        // Display the dashboard with reports
        // Show all if user is call-center employee
        // Show those that are assigned to the user if user is a driver
        // Filter reports based on filter form filled in data, within above 'filter' of user type
        // Refresh page and show new results 
        // OR Instantly show updated results when filter form is filled in and submitted


        $query = Report::query();
        // Municipality
        if ($request->filled('municipality')) {
            $query->whereHas('animal.owner', function ($q) use ($request) {
                $q->where('municipality', $request->municipality);
            });
        }

        // Animal type
        if ($request->filled('type')) {
            if ($request->type === 'other' && $request->filled('othertype')) {
                $query->whereHas('animal', function ($q) use ($request) {
                    $q->where('type', 'other')->where('other_type', $request->othertype);
                });
            } else {
                $query->whereHas('animal', function ($q) use ($request) {
                    $q->where('type', $request->type);
                });
            }
        }

        // Condition
        if ($request->filled('condition')) {
            $query->whereHas('animal.conditions', function ($q) use ($request) {
                $q->where('name', $request->condition);
            });
        }

        // City
        if ($request->filled('city')) {
            $query->whereHas('animal', function ($q) use ($request) {
                $q->where('city', $request->city);
            });
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
