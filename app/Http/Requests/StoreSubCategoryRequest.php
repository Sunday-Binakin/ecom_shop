<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoryRequest extends FormRequest
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
            'sub_category_name' => 'required|unique:sub_categories',
        ];
    }

    public  function messages()
    {
        # code...
        return [
            'sub_category_name.required' => 'SubCategory Name is required',
            'sub_category_name.unique' => 'SubCategory Name is already taken',
        ];
    }
}
