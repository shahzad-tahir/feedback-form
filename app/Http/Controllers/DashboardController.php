<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackAnswer;
use App\Models\VehicleQR;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index(Request $request): Factory|View|Application
    {
        $dateRange = $request->date_range ? explode(' to ', $request->date_range) : null;
        $vehicleId = $request->vehicle_id;

        $graph = $this->feedbackGraph($vehicleId, $dateRange);
        $graph2 = $this->vehicleFeedbacks();

        $vehicles = VehicleQR::get();
        $vehicleCount = VehicleQR::get()->count();
        $feedbacks = Feedback::get()->count();

        return view('dashboard',compact('vehicles','feedbacks', 'graph', 'graph2', 'vehicleCount'));
    }

    /**
     * @param $vehicleId
     * @param $dateRange
     * @return array
     */
    protected function feedbackGraph($vehicleId, $dateRange): array
    {
        $graph = [];

        foreach (FeedbackAnswer::QUESTIONS as $key => $item) {
            $answersCount = FeedbackAnswer::select(DB::raw('count(answer) as total, answer'))
                ->where('question', $key)
                ->whereHas('feedback', function ($q) use ($vehicleId, $dateRange) {
                    return $q->whereVehicleDaterange($vehicleId, $dateRange);
                })
                ->groupBy('answer')
                ->orderByDesc('answer')
                ->get()
                ->mapWithKeys(function($item) {
                    return [$item['answer'] => $item['total']];
                })
                ->put(0,$item);

            $graph[] = $answersCount;
        }

        $graph = collect($graph)->map(function($item) {
            $question = $item[0];

            if (count($item) < 8 ) {
                $existingAns = [];

                $item->each(function($a, $key) use (&$existingAns){
                    if ($key != 0) $existingAns[] = $key;
                });

                foreach (array_keys(FeedbackAnswer::OPTIONS) as $opt) {
                    if (!in_array($opt, $existingAns)) {
                        $item->put($opt,0);
                    }
                }
            }

            $item = $item->sortKeysDesc()->forget(0);

            $sortedItem = collect();
            $index = 1;

            $item->each(function($qs) use(&$sortedItem, &$index){
                $sortedItem->put($index, (int)$qs);
                $index++;
            });

            return $sortedItem->put(0, $question)->sortKeys();
        })->toArray();

        $services = [['Services', 'Excellent', 'Good', 'Satisfactory', 'Unsatisfactory', 'Not Acceptable', 'Yes', 'No']];
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
