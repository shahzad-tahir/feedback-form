<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'contact_no',
        'email',
        'vehicle_qr_id',
        'remarks',
        'trip_date',
        'trip_time'
    ];

    /**
     * @return BelongsTo
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(VehicleQR::class, 'vehicle_qr_id');
    }

    /**
     * @return HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(FeedbackAnswer::class, 'feedback_id');
    }

    /**
     * @return Attribute
     */
    protected function tripDate(): Attribute
    {
        return Attribute::make(
            set: fn($value) => date('Y-m-d', strtotime($value))
        );
    }

    /**
     * @param $query
     * @param $vehicleId
     * @param $dateRange
     * @return mixed
     */
    public function scopeWhereVehicleDaterange($query, $vehicleId, $dateRange): mixed
    {
        return $query->when(isset($dateRange[1]), function ($q) use ($dateRange) {
            return $q->whereBetween('trip_date', [$dateRange[0], $dateRange[1]]);
        }, function ($q) use ($dateRange) {
            return isset($dateRange[0]) ? $q->where('trip_date', $dateRange[0]) : $q;
        })->when(!empty($vehicleId), function ($q) use ($vehicleId) {
            return $q->where('vehicle_qr_id', $vehicleId);
        });
    }


}
