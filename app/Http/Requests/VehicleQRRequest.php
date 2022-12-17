<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleQRRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'max:200|string|required',
            'number' => 'nullable|max:200|required|unique:vehicle_q_r_s,number'
        ];
    }
}
