<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'userEmailAddress' => 'required|email',
            'userPassword' => ['required', 'string','min:6','max:40']
        ];
    }


    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'field', 'Something is wrong with this field!',
            'same' => 'The :attribute and :other must match.',
            'size' => 'The :attribute must be exactly :size.',
            'between' => 'The :attribute value :input is not between :min - :max.',
            'in' => 'The :attribute must be one of the following types: :values',
            'max' => 'Your :attribute is too long!',
            'min' => 'Your :attribute is too sort!'
        ];
    }
}
