<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'max:300|string|nullable',
            'contact_number' => 'max:50|string|nullable',
            'email' => 'max:200|string|email|nullable',
            'vehicle_qr_id' => 'required|exists:vehicle_q_r_s,id'
        ];
    }
}
