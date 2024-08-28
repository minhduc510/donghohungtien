<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateAddDiscount extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->guard('admin')->check()) {
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
        $rule=[
            "created_at" => "required",
            "end_date" => "required",
            "name" => "required|min:3|max:250",
        ];
        
        return $rule;
    }
    public function messages()
    {
        return [
            "name.required" => "name  is required",
            "name.unique" => "name setting is exits",
            "name.min" => "name  > 3",
            "name.max" => "name  < 250",
            "created_at.required" => "ngày bắt đầu phải chọn",
            "end_date.required" => "ngày kết thúc phải chọn",
        ];
    }
}
