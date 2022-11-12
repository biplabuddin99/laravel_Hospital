<?php

namespace App\Http\Requests\patient;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'patientName'=>'required|string',
            'patientAge'=>'required|string',
            'patientPhone'=>'required|string',
            'birth_date'=>'required|date',
            'patientGender'=>'required|string',
            'patientBlood'=>'required|string',
            'patientProblem'=>'required|string',
        ];
    }
}
