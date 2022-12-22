<?php

namespace App\Http\Requests;

use App\Models\FeedbackAnswer;
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
        $questionValidations = FeedbackAnswer::VALIDATION_RULES;

        $rules = [];

        foreach ($questionValidations as $key => $validation) {
            $rules[$key] = $validation;
        }

        $defaultRules = [
            'customer_name' => 'max:300|string|nullable',
            'contact_no' => 'max:50|string|nullable',
            'email' => 'max:200|string|email|nullable',
            'vehicle_qr_id' => 'required|exists:vehicle_q_r_s,id',
            'remarks' => 'max:1000',
            'trip_date' => 'required',
            'trip_time' => 'required',
        ];

        return array_merge($rules, $defaultRules);
    }

    public function messages()
    {
        $dynamicFields = array_keys(FeedbackAnswer::VALIDATION_RULES);

        $messages = [];

        foreach ($dynamicFields as $field) {
            $messages[$field.'.required'] = 'Field is required';
        }

        $staticMessages = [
          'trip_date.required' => 'Field is required',
          'trip_time.required' => 'Field is required',
        ];

        return array_merge($messages,$staticMessages);
    }
}
