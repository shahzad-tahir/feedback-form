<?php

namespace App\Http\Controllers;

use App\Models\FeedbackAnswer;
use App\Models\VehicleQR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $vehicles = VehicleQR::all();

        return view('reports.index',compact('vehicles'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required_without_all:date_range|exists:vehicle_q_r_s,id',
            'date_range' => 'required_without_all:vehicle_id',
        ]);

        $dateRange = $request->date_range ? explode(' to ', $request->date_range) : null;
        $vehicleId = $request->vehicle_id;

        $report = FeedbackAnswer::getReport($vehicleId, $dateRange);

        $vehicle = VehicleQR::find($vehicleId);

        $questions = FeedbackAnswer::QUESTIONS;

        $date = $request->date_range;

        return view('reports.detail', compact('report', 'vehicle', 'date', 'questions'));
    }
}
