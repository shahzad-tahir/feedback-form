<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedbackAnswer extends Model
{
    use HasFactory;

    public const QUESTIONS = [
        'q1' => "How is the Ride?",
        'q2' => "Air Conditioning in the Bus?",
        'q3' => "Seats / Curtains In the Bus?",
        'q4' => "Is Driver Driving Safely?",
        'q5' => "Safe Distance Maintaining while driving?",
        'q6' => "Driving on the Humps?",
        'q7' => "Does the Driver Follow RTA Rules/ Traffic Signs Always?",
        'q8' => "Uniform condition driver's?",
        'q9' => "How is the Driver's Behaviour?",
        'q10' => "Please comment on Driver's Grooming?",
        'q11' => "Does Driver Use hands free while driving?",
        'q12' => "Do you always reach on Time?",
        'q13' => "Overall Comment?"
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
