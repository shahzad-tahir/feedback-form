<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class FeedbackAnswer extends Model
{
    use HasFactory;

    public const QUESTIONS = [
        'q1' => "How was your trip experience?",
        'q2' => "Seats condition in the vehicle?",
        'q3' => "Vehicle cleanliness?",
        'q4' => "Driver’s Uniform and grooming condition?",
        'q5' => "Did Driver drive safely during the trip?",
        'q6' => "Driver Maintained safe distance while driving?"
    ];

    public const OPTIONS = [
        5 => 'Excellent',
        4 => 'Good',
        3 => 'Satisfactory',
        2 => 'Unsatisfactory',
        1 => 'Not Acceptable'
    ];

    public const VALIDATION_RULES = [
        'q4' => 'required',
        'q5' => 'required',
        'q6' => 'required'
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

    /**
     * @param $vehicleId
     * @param $date
     * @return Collection
     */
    public static function getReport($vehicleId, $date): Collection
    {
        $graph = [];

        foreach (self::QUESTIONS as $key => $item) {
            $answersCount = self::select(DB::raw('count(answer) as total, answer'))
                ->where('question', $key)
                ->whereHas('feedback', function ($q) use ($vehicleId, $date) {
                    return $q->whereVehicleDaterange($vehicleId, $date);
                })
                ->groupBy('answer')
                ->orderByDesc('answer')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item['answer'] => $item['total']];
                })
                ->put(0, $key);

            $graph[] = $answersCount;
        }

        return collect($graph)->map(function ($item) {
            $question = $item[0];

            if (count($item) < 6) {
                $existingAns = [];

                $item->each(function ($a, $key) use (&$existingAns) {
                    if ($key != 0) $existingAns[] = $key;
                });

                foreach (array_keys(self::OPTIONS) as $opt) {
                    if (!in_array($opt, $existingAns)) {
                        $item->put($opt, 0);
                    }
                }
            }

            $item = $item->sortKeysDesc()->forget(0);

            $sortedItem = collect();
            $index = 1;

            $item->each(function ($qs) use (&$sortedItem, &$index) {
                $sortedItem->put($index, (int)$qs);
                $index++;
            });

            return $sortedItem->put(0, $question)->sortKeys();
        });
    }
}
