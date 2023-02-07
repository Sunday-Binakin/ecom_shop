<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandsRequest extends FormRequest
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
            'brand_name' => 'required|unique:categories',
        ];
    }

    public  function messages()
    {
        # code...
        return [
            'brand_name.required' => 'Brand Name is required',
            'brand_name.unique' => 'Brand Name is already taken',
        ];
    }
}
