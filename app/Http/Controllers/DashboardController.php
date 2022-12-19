<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackAnswer;
use App\Models\VehicleQR;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $vehicles = VehicleQR::get()->count();
        $feedbacks = Feedback::get()->count();

        $graph = $this->feedbackGraph();
        $graph2 = $this->vehicleFeedbacks();

        return view('dashboard',compact('vehicles','feedbacks', 'graph', 'graph2'));
    }

    /**
     * @return array
     */
    protected function feedbackGraph(): array
    {
        $graph = [];

        foreach (FeedbackAnswer::QUESTIONS as $key => $item) {
            $answersCount = FeedbackAnswer::select(DB::raw('count(answer) as total'))
                ->where('question', $key)
                ->groupBy('answer')
                ->orderByDesc('answer')
                ->get()
                ->pluck('total')
                ->prepend($item);

            $graph[] = $answersCount;
        }

        $graph = collect($graph)->map(function($item) {
            if (count($item) < 6) {
                $remaining = 6 - count($item);
                for ($i = 0; $i < $remaining; $i++) {
                    $item->push(0);
                }
            }

            return $item;
        })->toArray();

        $services = [['Services', 'Excellent', 'Good', 'Satisfactory', 'Unsatisfactory', 'Not Acceptable']];

        return array_merge($services,$graph);
    }

    /**
     * @return array
     */
    protected function vehicleFeedbacks(): array
    {
        $vehicles = VehicleQR::select('number')
            ->withCount('feedbacks')
            ->orderByDesc('number')
            ->get()
            ->map(function($feedback) {
                $feedback->feedbacks_count = (int)$feedback->feedbacks_count;
                return collect($feedback)->values();
            })->toArray();

        $headings = [['Vehicle Number', 'Feedbacks Received']];

        return array_merge($headings,$vehicles);
    }
}
