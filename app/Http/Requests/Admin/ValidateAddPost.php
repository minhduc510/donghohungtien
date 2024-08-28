<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateAddPost extends FormRequest
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
            "view" => "nullable|integer",
            "hot" => "nullable|integer",
            "category_id" => 'exists:App\Models\CategoryPost,id',
            "active" => "required",
            "category" => "required",
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
            // $leng=count($keyConlai);

            // array_map(function($k,$i){
            // },$keyConlai);
            // $defirent=implode("name_",$keyConlai);

            $rule['name_' . $key] = "required|min:3|max:250";
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
        return [
            "name.required" => "Name post is required",
            "name.min" => "Name post > 3",
            "name.max" => "Name post < 250",
            "slug.required" => "slug post is required",
            "slug.unique" => "slug post is exits",
            "hot.integer" => "hot is integer",
            "view.integer" => "view is integer",
            "avatar.mimes" => "avatar  in jpeg,jpg,png,svg",
            "avatar_path.max" => "Dung lượng ảnh quá lớn (nhỏ hơn 1mb)",
            "active.required" => "active  is required",
            "category.required" => "Bạn phải lựa chọn chuyên mục",
            "category_id" => "category_id k tồn tại",
        ];
    }
}
