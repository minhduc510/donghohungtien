<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NumberMin;
class ValidateAddStore extends FormRequest
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
            "active" => "required",
            "checkrobot" => "accepted",
        ];

        if(request()->type==1){
            $rule['masp']= "required|exists:\App\Models\Product,masp";
            $rule['quantity']= [
                "required",
                "integer",
                new NumberMin(1),
            ];
        }
        if(request()->type==2){
            $rule['transaction_code']= "required|exists:\App\Models\Transaction,code";

        }
        return  $rule;
    }
    public function messages()
    {
        return  [
            "masp.required" => "mã sản phẩm là trường bắt buộc",
            "masp.exists" => "Mã sản phẩm không tồn tại",
            "transaction_code.required" => "mã giao dịch là trường bắt buộc",
            "transaction_code.exists" => "Mã giao dịch không tồn tại",
            "quantity.required" => "Số lượng sản phẩm là trường bắt buộc",
            "quantity.integer" => "Số lượng phải là số nguyên",
            "active.required" => "active  là trường bắt buộc",
            "checkrobot.accepted" => "checkrobot  is accepted",
        ];
    }
}
