<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleQR extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'number',
      'qr_code_image'
    ];
}
