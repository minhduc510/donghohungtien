<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateAddCategoryLanding extends FormRequest
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
        $rule = [
            "order" => "nullable|numeric",
            "avatar_path" => "mimes:jpeg,jpg,png,svg,webp,gif|nullable|file|max:1024",
            "icon_path" => "mimes:jpeg,jpg,png,svg,webp,gif|nullable|file|max:1024",
            "active" => "required",
        ];

        return $rule;
    }
    public function messages()
    {
        return     [
            "name.required" => "Name category is required",
            "name.min" => "Name category > 2",
            "name.max" => "Name category < 500",
            "slug.required" => "slug category is required",
            "slug.unique" => "slug đã tồn tại",
            "icon.mimes" => "icon category in jpeg,jpg,png,svg,gif,webp",
            "icon_path.max" => "icon category size < 3mb",
            "avatar.mimes" => "avatar category in jpeg,jpg,png,svg,gif,webp",
            "avatar_path.max" => "avatar category size < 3mb",
            "active.required" => "active category is required",
            "checkrobot.accepted" => "checkrobot category is accepted",
        ];
    }
}
