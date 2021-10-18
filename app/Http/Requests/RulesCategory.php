<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RulesCategory extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'image' => 'required',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Category name không được để trống',
            'name.max' => 'Category name đã vượt quá ký tuej cho phép',
            'image.required' => 'Image không được để trống'
        ];
    }
}
