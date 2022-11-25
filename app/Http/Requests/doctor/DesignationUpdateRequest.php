<?php

namespace App\Http\Requests\doctor;

use Illuminate\Foundation\Http\FormRequest;

class DesignationUpdateRequest extends FormRequest
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
            'DesignationName'=>'bail|required|string',
            'DesignationDescription'=>'bail|required|string',
            'status'=>'nullable',
        ];
    }
        public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
        ];
    }
}
