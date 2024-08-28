<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateUpdateCopyProduct extends FormRequest
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

            // "masp"=>[
            //     "required",
            //     "min:1",
            //     "max:355",
            //     //Rule::unique("App\Models\Product", 'masp')->where(function ($query) {
            //     //    return $query->where([
            //     //        ['deleted_at', null],
            //     //    ]);
            //     //})
            // ],

            "price" => "nullable|numeric",
            "size" => "nullable|string|min:1|max:355",
            "sale" => "nullable|numeric",
            "file" => "nullable|file|max:5000",
            "file2" => "nullable|file|max:5000",
            "file3" => "nullable|string|min:1|max:355",
            // "hot"=>"required",
            // "pay"=>"required",
            // "number"=>"required",
            "warranty" => "nullable",
            // "view"=>"required",
            "order" => "nullable|numeric",
            "avatar_path" => "mimes:jpeg,jpg,png,svg,webp|nullable|file|max:1024",
            "image_path.*" => "mimes:jpeg,jpg,png,svg,webp|nullable|file|max:1024",
            "category_id" => 'exists:App\Models\CategoryProduct,id',
            "supplier_id" => 'exists:App\Models\Supplier,id',
            "active" => "required",
            "category" => "required",
            //  "checkrobot"=>"accepted"
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
            $rule['name_' . $key] = "required|min:1|max:355";
            $rule['slug_' . $key] = [
                "required",
                'different:' . $stringKey,
                Rule::unique("App\Models\Key", 'slug'),
            ];
            $rule['title_seo_' . $key] = "nullable|min:1|max:355";
            $rule['description_seo_' . $key] = "nullable|min:1|max:355";
            $rule['keyword_seo_' . $key] = "nullable|min:1|max:355";

            $rule['model_' . $key] = [
                "nullable",
                "min:1",
                "max:355",
            ];
            $rule['tinhtrang_' . $key] = [
                "nullable",
                "min:1",
                "max:355",
            ];
            $rule['baohanh_' . $key] = [
                "nullable",
                "min:1",
                "max:355",
            ];
            $rule['xuatsu_' . $key] = [
                "nullable",
                "min:1",
                "max:355",
            ];
        }

        $priceOption = request()->input('priceOption') ?? [];
        foreach ($priceOption as $key => $value) {
            $rule['priceOption.' . $key] = 'required_with:sizeOption.' . $key;
            $rule['sizeOption.' . $key] = 'required_with:priceOption.' . $key;
        }


        return $rule;
    }
    public function messages()
    {
        return [
            // "masp.required"=>"Mã sản phẩm là trường bắt buộc",
            // "masp.min"=>"Mã sản phẩm  > 1",
            // "masp.max"=>"Mã sản phẩm  < 355",
            // "masp.unique"=>"Mã sản phẩm  đã tồn tại",
            "name.required" => "Name product is required",
            "name.min" => "Name product > 1",
            "name.max" => "Name product < 355",
            "slug.required" => "slug product is required",
            "slug.unique" => "Mã sản phẩm  đã tồn tại",
            "price" => "price is required",
            // "sale"=>"sale is required",
            //"hot"=>"hot is required",
            // "pay"=>"pay is required",
            // "number"=>"number is required",
            // "warranty"=>"hot is required",
            // "view"=>"hot is required",
            "avatar_path.mimes" => "avatar  in jpeg,jpg,png,svg",
            "active.required" => "active  is required",
            "category_id" => "category_id k tồn tại",
            "category.required" => "Bạn phải lựa chọn chuyên mục",
            "checkrobot.accepted" => "checkrobot product is accepted",
        ];
    }
}
