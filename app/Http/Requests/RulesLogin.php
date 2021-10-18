<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RulesLogin extends FormRequest
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
            'password' => 'required|min:0',
            'email' => 'required|max:255',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'email không được để trống',
            'password.required' => 'password không được để trống',
            'email.max' => 'email vượt quá ký tự cho phép'
        ];
    }
}
