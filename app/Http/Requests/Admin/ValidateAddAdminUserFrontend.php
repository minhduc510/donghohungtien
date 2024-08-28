<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
use App\Models\Role;
use App\Rules\NumberMin;
class ValidateAddAdminUserFrontend extends FormRequest
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
        return [
            "name" => "required|min:3|max:250",
            // "email" =>  [
            //     "nullable",
            //     Rule::unique("App\Models\User",'email')->where(function ($query) {
            //         return $query->where([
            //             ['deleted_at','=', null]
            //         ]);
            //     })
            // ],
            "username" =>  [
                "required",
                Rule::unique("App\Models\User",'username')->where(function ($query) {
                    return $query->where([
                        ['deleted_at','=', null]
                    ]);
                })
            ],
            // "startpoint" =>[
            //     "required",
            //     new NumberMin(200)
            // ],
            "masp"=>[
                "required",
                "min:3",
                "max:250",
                "exists:\App\Models\Product,masp",
            ],
            // "password" =>"required",
            // "password_confirmation"=>"required|same:password",
            // "role_id"=>[
            //     "required",
            //     new ArrayValueExistDatabase(Role::all(),'id',request()->role_id)
            // ],
           // "active" => "required",
            "checkrobot" => "accepted",
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Tên là trường bắt buộc",
            "name.min" => "Tên  > 3",
            "name.max" => "Tên  < 250",
            "email.required" => "email là trường bắt buộc",
            "email.unique" => "email là đã tồn tại",
            "username.required" => "username  là trường bắt buộc",
            "username.unique" => "username đã tồn tại",
            "password.required" => "password  là trường bắt buộc",
            "password_confirmation.required" => "Nhập lại password  là trường bắt buộc",
            "password_confirmation.same" => "Nhập lại password không giống nhau",
            "active.required" => "active  là trường bắt buộc",
            "checkrobot.accepted" => "checkrobot  là trường bắt buộc",
            "masp.required" => "Mã sản phẩm là trường bắt buộc",
            "masp.min" => "ã sản phẩm  > 3",
            "masp.max" => "ã sản phẩm  <250",
            "masp.exists" => "Mã sản phẩm  không tồn tại",
        ];
    }
}
