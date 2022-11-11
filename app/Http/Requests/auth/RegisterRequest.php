<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            // 'userRoles'=>'required',
            'userFullName' =>'required|string',
            'userEmailAddress' => 'required|unique:users,email',
            'userPhoneNumber' => 'required|unique:users,contact_no',
            'userPassword' => 'required|min:6',
            // 'profile_picture' => 'mimes:jpg,jpeg,png,bmp,tiff,gif |max:4096',
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
        'min' => 'Your :attribute is too sort!',
        'mimes' => 'Only JPG or PNG are allowed'
    ];
}

}

