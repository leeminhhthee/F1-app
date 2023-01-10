<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPassword extends FormRequest
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

    public function rules()
    {
        return [
            'password_old' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'password_old.required' => 'This field cannot be left blank.',
            'password.required' => 'This field cannot be left blank.',
            'confirm_password.required' => 'This field cannot be left blank.',
            'confirm_password.same' => 'Does not match the new password.',
        ];
    }
}
