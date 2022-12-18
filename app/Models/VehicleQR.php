<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleQR extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'number',
      'qr_code_image'
    ];

    /**
     * @return HasMany
     */
    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class, 'vehicle_qr_id');
    }
}
