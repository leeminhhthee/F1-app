<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'pro_name' => 'required|unique:products,pro_name,'.$this->id,
            'pro_cate_id' => 'required',
            'pro_price' => 'required',
            'pro_content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'pro_name.required' => 'The "Product Name" field is required.',
            'pro_cate_id.required' => 'The field is required.',
            'pro_price.required' => 'The "Price" field is required.',
            'pro_content.required' => 'The "Content" field is required.',
        ];
    }
}
