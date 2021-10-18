<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RulesSlide extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'subtitle' => 'required',
            'title' => 'required',
            'old_price' => 'required',
            'new_price' => 'required',
            'background' => 'required',
        ];
    }
    public function messages(){
        return [
            'subtitle.required' => 'subtitle không được để trống',
            'title.required' => 'title không được để trống',
            'old_price.required' => 'old_price không được để trống',
            'new_price' => 'new_price vượt quá ký tự cho phép',
            'background.required' => 'background không được để trống'
        ];
    }
}
