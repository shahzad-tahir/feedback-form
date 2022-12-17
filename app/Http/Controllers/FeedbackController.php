<?php

namespace App\Http\Controllers;

use App\Models\VehicleQR;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class FeedbackController extends Controller
{
    public function index(VehicleQR $vehicleQR): Factory|View|Application
    {
        return view('feedback.feedback-survey', compact('vehicleQR'));
    }
}
