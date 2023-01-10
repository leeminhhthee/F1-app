<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
            'CategoryName' => 'required|unique:categories,c_name,'.$this->id
        ];
    }

    public function messages()
    {
        return [
            'CategoryName.required' => 'The "Category Name" field is required.'
        ];
    }
}
