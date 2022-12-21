<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedbackAnswer extends Model
{
    use HasFactory;

    public const QUESTIONS = [
        'q1' => "How was your trip experience?",
        'q2' => "Seats in the vehicle?",
        'q3' => "Vehicle cleanliness?",
        'q4' => "Driver’s Uniform and grooming condition?",
        'q5' => "Does Driver drive safely during the trip?",
        'q6' => "Driver Maintained safe distance while driving?",
        'q7' => "Does Driver used hands-free while driving always?",
        'q8' => "Does the driver follow RTA/DOT/Traffic rules & signs?"
    ];

    public const OPTIONS = [
        5 => 'Excellent',
        4 => 'Good',
        3 => 'Satisfactory',
        2 => 'Unsatisfactory',
        1 => 'Not Acceptable'
    ];

    protected $fillable = [
        'feedback_id',
        'question',
        'answer'
    ];

    /**
     * @return BelongsTo
     */
    public function feedback(): BelongsTo
    {
        return $this->belongsTo(Feedback::class, 'feedback_id');
    }
}
