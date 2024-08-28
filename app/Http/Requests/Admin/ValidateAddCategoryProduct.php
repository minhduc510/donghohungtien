<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateAddCategoryProduct extends FormRequest
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
            "avatar_path" => "mimes:jpeg,jpg,png,svg,webp|nullable|file|max:1024",
            "icon_path" => "mimes:jpeg,jpg,png,svg,webp|nullable|file|max:1024",
            "active" => "required",

        ];
        $langConfig = config('languages.supported');
        $langDefault = config('languages.default');

        foreach ($langConfig as $key => $value) {
            $arrConlai = $langConfig;
            unset($arrConlai[$key]);
            $keyConlai = array_keys($arrConlai);
            $keyConlai = collect($keyConlai);
            $stringKey = $keyConlai->map(function ($item, $key) {
                return "slug_" . $item;
            });
            $stringKey = $stringKey->implode(', ');

            $rule['name_' . $key] = "required|min:1|max:250";
            $rule['slug_' . $key] = [
                "required",
                'different:' . $stringKey,
                Rule::unique("App\Models\Key", 'slug'),
            ];
            $rule['title_seo_' . $key] = "nullable|min:1|max:355";
            $rule['description_seo_' . $key] = "nullable|min:1|max:355";
            $rule['keyword_seo_' . $key] = "nullable|min:1|max:355";
        }
        return $rule;
    }
    public function messages()
    {
        return     [
            "name.required" => "Name category is required",
            "name.min" => "Name category > 3",
            "name.max" => "Name category < 100",
            "slug.required" => "slug category is required",
            "slug.unique" => "slug đã tồn tại",
            "icon.mimes" => "icon category in jpeg,jpg,png,svg",
            "icon_path.max" => "icon category size < 3mb",
            "avatar.mimes" => "avatar category in jpeg,jpg,png,svg",
            "avatar_path.max" => "avatar category size < 3mb",
            "active.required" => "active category is required",
            "checkrobot.accepted" => "checkrobot category is accepted",
        ];
    }
}
