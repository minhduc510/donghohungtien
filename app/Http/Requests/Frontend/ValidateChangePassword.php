<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ValidateChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->guard('web')->check()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'min:8',
            'comfim_password' => 'required_with:password|same:password|min:8'
        ];
    }

    public function messages()
    {
        return [
            "old_password.min" => "password phải lớn hơn 8 ký tự",
            "comfim_password.min" => "password phải lớn hơn 8 ký tự",
            "comfim_password.same" => "Password nhập không giống nhau",
        ];
    }
}
