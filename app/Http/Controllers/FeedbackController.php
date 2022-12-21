<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use App\Models\FeedbackAnswer;
use App\Models\VehicleQR;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $feedbacks = Feedback::orderByDesc('id')->get();

        return view('feedback.index', compact('feedbacks'));
    }

    /**
     * @param VehicleQR $vehicleQR
     * @return Factory|View|Application
     */
    public function show(VehicleQR $vehicleQR): Factory|View|Application
    {
        $questions = FeedbackAnswer::QUESTIONS;
        $options = FeedbackAnswer::OPTIONS;

        return view('feedback.feedback-survey', compact('vehicleQR', 'questions', 'options'));
    }

    /**
     * @param FeedbackRequest $request
     * @return RedirectResponse
     */
    public function store(FeedbackRequest $request): RedirectResponse
    {
        $feedback = Feedback::create($request->all(
            ['vehicle_qr_id', 'customer_name', 'contact_no', 'email', 'remarks', 'trip_date', 'trip_time']
        ));

        $answers = collect($request->only(array_keys(FeedbackAnswer::QUESTIONS)))->map(function ($ans, $key) {
            return [
                'question' => $key,
                'answer' => $ans
            ];
        })->values();

        $feedback->answers()->createMany($answers);

        return redirect()->route('feedback.success');
    }

    /**
     * @return Application|Factory|View
     */
    public function success(): View|Factory|Application
    {
        return view('feedback.success');
    }

    /**
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function destroy(Feedback $feedback): RedirectResponse
    {
        $feedback->delete();

        Session::flash('message', 'Feedback deleted successfully');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('feedback.index');
    }

    /**
     * @param Feedback $feedback
     * @return Factory|View|Application
     */
    public function detail(Feedback $feedback): Factory|View|Application
    {
        $feedback->load('answers');
        $questions = FeedbackAnswer::QUESTIONS;

        return view('feedback.detail', compact('feedback','questions'));
    }
}
