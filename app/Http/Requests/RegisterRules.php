<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRules extends FormRequest
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
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|unique:customers|email|max:255',
            'password' => 'required|max:32'
            //
        ];
    }

    public function messages(){
        return [
            'email.required' => 'email không được để trống',
            'first_name.required' => 'first_name không được để trống',
            'last_name.required' => 'last_name không được để trống',
            'password.required' => 'password không được để trống',
            'email.max' => 'email vượt quá ký tự cho phép',
            'email.unique' => 'email đã tồn tại',
            'password.max' => 'password đã quá số ký tự cho phép',
        ];
    }
}
