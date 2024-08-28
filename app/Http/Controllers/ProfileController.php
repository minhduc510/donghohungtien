<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DiscountCode;
use App\Models\AddressOfUser;
use App\Models\Point;
use App\Models\Product;
use App\Models\City;
use App\Models\District;
use App\Models\Commune;
use App\Helper\AddressHelper;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Frontend\ValidateAddUser;
use App\Http\Requests\Frontend\ValidateChangePassword;
use App\Http\Requests\Frontend\ValidateEditUser;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Frontend\ValidateDrawPoint;
use App\Models\Bank;
use App\Models\Transaction;
use App\Traits\PointTrait;
use Illuminate\Support\Carbon;


class ProfileController extends Controller
{
    //
    use StorageImageTrait, PointTrait, DeleteRecordTrait;
    private $user;
    private $addressOfUser;
    private $discountCode;
    private $point;
    private $product;
    private $city;
    private $district;
    private $commune;
    private $typePoint;
    private $rose;
    private $typePay;
    private $datePay;
    private $bank;
    public function __construct(
        User $user, 
        Point $point, 
        Bank $bank, 
        City $city, 
        District $district, 
        Commune $commune,
        Transaction $transaction, 
        Product $product, 
        DiscountCode $discountCode, 
        AddressOfUser $addressOfUser)
    {

        $this->user = $user;
        $this->discountCode = $discountCode;
        $this->point = $point;
        $this->bank = $bank;
        $this->city = $city;
        $this->district = $district;
        $this->commune = $commune;
        $this->addressOfUser = $addressOfUser;
        $this->typePoint = config('point.typePoint');
        $this->typePay = config('point.typePay');
        $this->rose = config('point.rose');
        $this->datePay = config('point.datePay');
        $this->transaction = $transaction;
        $this->listStatus = $this->transaction->listStatus;
        $this->product = $product;
    }
    public function index(Request $request)
    {

        $user = auth()->guard()->user();
        $sumEachType = $this->point->sumEachTypeFrontend($user->id);
        //   dd($sumEachType);

        $sumPointCurrent = $this->point->sumPointCurrent($user->id);
        //  dd($sumPointCurrent);
        // $numberPointRose = $user->points()->select($this->transaction->raw('count(status) as total'), 'status')->groupBy('status')->get();
        //  $numberPointRose=1;
        //  dd($numberPointRose);
        if (date('d') >= $this->datePay['start'] && date('d') <= $this->datePay['end']) {
            $openPay = true;
        } else {
            $openPay = false;
        }
        //   dd($openPay);

        return view('frontend.pages.profile.profile', [
            'user' => $user,
            'sumEachType' => $sumEachType,
            'sumPointCurrent' => $sumPointCurrent,
            'typePoint' => $this->typePoint,
            'openPay' => $openPay,
            'seo' => [
                'title' =>  "Thông tin tài khoản",
                'keywords' =>  "Thông tin tài khoản",
                'description' =>  "Thông tin tài khoản",
                'image' => "Thông tin tài khoản",
                'abstract' =>  "Thông tin tài khoản",
            ]
        ]);
    }

    public function history(Request $request)
    {
        $user = auth()->guard()->user();

        $data = $user->transactions()->paginate(15);


        $transactionGroupByStatus = $user->transactions()->select($this->transaction->raw('count(status) as total'), 'status')->groupBy('status')->get();
        $totalTransaction = $this->transaction->where('user_id', $user->id)->get()->count();

        //   dd( $transactionGroupByStatus);
        $dataTransactionGroupByStatus = $this->listStatus;
        foreach ($transactionGroupByStatus as $item) {
            $dataTransactionGroupByStatus[$item->status]['total'] = $item->total;
        }

        // dd($dataTransactionGroupByStatus);
        //  $sumEachType = $this->point->sumEachType($user->id);
        //   $sumPointCurrent = $this->point->sumPointCurrent($user->id);

        return view('frontend.pages.profile.profile-history', [
            'dataTransactionGroupByStatus' => $dataTransactionGroupByStatus,
            'totalTransaction' => $totalTransaction,
            'user' => $user,
            'data' => $data,
            'listStatus' => $this->listStatus,
            'seo' => [
                'title' =>  "Lịch sử mua hàng",
                'keywords' =>  "Lịch sử mua hàng",
                'description' =>  "Lịch sử mua hàng",
                'image' => "Lịch sử mua hàng",
                'abstract' =>  "Lịch sử mua hàng",
            ]
        ]);
    }

    public function loadTransactionDetail($id)
    {
        $orders = $this->transaction->find($id)->orders()->get();

        return response()->json([
            'code' => 200,
            'html' => view('frontend.components.transaction-detail', [
                'orders' => $orders,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }


    public function editInfo()
    {
        $user = auth()->guard('web')->user();
        $banks = $this->bank->get();
        return view('frontend.pages.profile.profile-edit-info', [
            'data' => $user, 
            'banks' => $banks, 
            'user' => $user,
            'seo' => [
                'title' =>  "Sửa thông tin tài khoản",
                'keywords' =>  "Sửa thông tin tài khoản",
                'description' =>  "Sửa thông tin tài khoản",
                'image' => "Sửa thông tin tài khoản",
                'abstract' =>  "Sửa thông tin tài khoản",
            ]
        ]);
    }

    public function editInfo2()
    {
        $user = auth()->guard('web')->user();
        $banks = $this->bank->get();
        return view('frontend.pages.profile.profile-edit-info2', [
            'data' => $user, 
            'banks' => $banks, 
            'user' => $user,
            'seo' => [
                'title' =>  "Sửa thông tin tài khoản",
                'keywords' =>  "Sửa thông tin tài khoản",
                'description' =>  "Sửa thông tin tài khoản",
                'image' => "Sửa thông tin tài khoản",
                'abstract' =>  "Sửa thông tin tài khoản",
            ]
        ]);
    }
    public function ranking()
    {
        $user = auth()->guard('web')->user();
        $banks = $this->bank->get();
        return view('frontend.pages.profile.profile-ranking', [
            'data' => $user, 
            'banks' => $banks, 
            'user' => $user,
            'seo' => [
                'title' =>  "Xếp hạng thành viên",
                'keywords' =>  "Xếp hạng thành viên",
                'description' =>  "Xếp hạng thành viên",
                'image' => "Xếp hạng thành viên",
                'abstract' =>  "Xếp hạng thành viên",
            ]
        ]);
    }
    public function discountCode()
    {
        $now = Carbon::now();
        $user = auth()->guard('web')->user();
        $discountCode = $this->discountCode->where('created_at', '<=', $now)->where('end_date', '>=', $now)->get();
        // dd($discountCode);
        return view('frontend.pages.profile.profile-discount-code', [
            'data' => $user, 
            'discountCode' => $discountCode, 
            'user' => $user,
            'seo' => [
                'title' =>  "Mã giảm giá",
                'keywords' =>  "Mã giảm giá",
                'description' =>  "Mã giảm giá",
                'image' => "Mã giảm giá",
                'abstract' =>  "Mã giảm giá",
            ]
        ]);
    }
    public function address()
    {
        $user = auth()->guard('web')->user();
        $addressOfUserFirst = $this->addressOfUser->where('user_id', $user->id)->where('default_address', 1)->first();
        $addressOfUser = $this->addressOfUser->where('user_id', $user->id)->where('default_address', 0)->get();
        $addressAll = $this->addressOfUser->where('user_id', $user->id)->get();
        $address = new AddressHelper();
        $data = $this->city->orderby('name')->get();
        $cities = $address->cities($data);
        return view('frontend.pages.profile.profile-address', [
            'data' => $user, 
            'cities' => $cities,
            'addressOfUserFirst' => $addressOfUserFirst,
            'addressOfUser' => $addressOfUser,
            'addressAll' => $addressAll,
            'user' => $user,
            'seo' => [
                'title' =>  "Sổ địa chỉ",
                'keywords' =>  "Sổ địa chỉ",
                'description' =>  "Sổ địa chỉ",
                'image' => "Sổ địa chỉ",
                'abstract' =>  "Sổ địa chỉ",
            ]
        ]);
    }
    public function changePassword()
    {
        $user = auth()->guard('web')->user();
        $banks = $this->bank->get();
        return view('frontend.pages.profile.profile-change-password', ['data' => $user, 'banks' => $banks, 'user' => $user]);
    }

    public function changeStorePassword(ValidateChangePassword $request)
    {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return redirect()->back()->with("error", "Mật khẩu hiện tại của bạn không khớp với mật khẩu cũ.");
        }
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->with("success", "Thay đổi mật khẩu thành công!");
    }
    public function updateInfo($id, Request $request)
    {
        /*try {*/
            DB::beginTransaction();
            $user = $this->user->find($id);
                if ($request->input('day') && $request->input('month') && $request->input('year')) {
                    $date_birth = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');
                }
                $dataUserUpdate = [
                    "name" => $request->input('name'),
                    "email" => $request->input('email'),
                    //"username" => $request->input('username'),
                    "phone" => $request->input('phone'),
                    "date_birth" => $date_birth,
                    "address" => $request->input('address'),
                    //"hktt" => $request->input('hktt'),
                    //"cmt" => $request->input('cmt'),
                    //"stk" => $request->input('stk'),
                    //"ctk" => $request->input('ctk'),
                    //"bank_id" => $request->input('bank_id'),
                    //"bank_branch" => $request->input('bank_branch'),
                    "sex" => $request->input('sex'),
                    'status' => 2,
                    // "active" => $request->input('active'),
                ];
 

                
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "product");
            if (!empty($dataUploadAvatar)) {
                $dataUserUpdate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            if (request()->has('password')) {
                $dataUserUpdate['password'] = Hash::make($request->input('password'));
            } else {
                $dataUserUpdate['password'] = $user->password;
            }

            // insert database in product table
            // dd($dataUserUpdate);
            $this->user->find($id)->update($dataUserUpdate);
            $user = $this->user->find($id);

            DB::commit();
            return redirect()->route('profile.editInfo', ['user' => $user])->with("alert", "Thay đổi thông tin thành công");
        /*} catch (\Exception $exception) {*/
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('profile.editInfo', ['user' => $user])->with("error", "Thay đổi thông tin không thành công");
        /*}*/
    }

    // danh sách hoa hồng được thưởng từ 20 lớp và hệ thống
    public function listRose()
    {
        $user = auth()->guard()->user();
        $data = $this->point->where([
            'user_id' => $user->id,
        ])->whereIn(
            'type',
            [2, 3, 8]
        )->orderby('created_at', 'DESC')->get();
        //dd($data);
        return view('frontend.pages.profile.profile-list-rose', [
            'data' => $data,
            'typePoint' => $this->typePoint,
            'user' => $user,
        ]);
    }
    public function listMember()
    {
        $user = auth()->guard()->user();


        //  dd($data);
        $data = $this->user->listUser20($user);
        //  dd($data);
        return view('frontend.pages.profile.profile-list-member', [
            'data' => $data,
            'typePoint' => $this->typePoint,
            'user' => $user,
        ]);
    }
    public function createMember(Request $request)
    {
        $user = auth()->guard()->user();
        return view('frontend.pages.profile.profile-create-member', [
            'user' => $user,
        ]);
    }
    public function storeMember(ValidateAddUser $request)
    {
        $userParent = auth()->guard()->user();
        try {
            DB::beginTransaction();
            $dataAdminUserFrontendCreate = [
                "name" => $request->input('name'),
                "username" => $request->input('username'),
                "parent_id" => $userParent->id,
                "password" => Hash::make('A123456'),
                "active" => 0,
            ];
            // dd($dataAdminUserFrontendCreate);
            // insert database in user table
            $user = $this->user->create($dataAdminUserFrontendCreate);
            // insert database to product_tags table
            // thêm số điểm nạp lúc đầu

            // if ($request->has('startpoint')) {
            //     $user->points()->create([
            //         'type' => $this->typePoint[4]['type'],
            //         'point' => $request->input('startpoint'),
            //         'active' => 1,
            //     ]);
            // }

            // thêm điểm thưởng lúc đầu
            $user->points()->create([
                'type' => $this->typePoint[1]['type'],
                'point' => $this->typePoint['defaultPoint'],
                'active' => 0,
            ]);

            $product = $this->product->where(['masp' => $request->input('masp')])->first();
            //  dd($product);
            //   dd($product);
            $code = makeCodeTransaction($this->transaction);

            $totalPrice = $product->price * (100 - $product->sale) / 100;

            // thêm số điểm nạp lúc đầu
            $user->points()->create([
                'type' => $this->typePoint[4]['type'],
                'point' => moneyToPoint($totalPrice),
                'active' => 0,
            ]);

            // Trừ điểm mua sản phẩm
            $user->points()->create([
                'type' => $this->typePoint[6]['type'],
                'point' => -moneyToPoint($totalPrice),
                'active' => 0,
            ]);

            $dataTransactionCreate = [
                'code' => $code,
                'total' => $totalPrice,
                'point' =>  0,
                'money' => $totalPrice,
                'name' => $user->name,
                'phone' => null,
                'note' => null,
                'email' => null,
                'status' => 1,
                'city_id' => null,
                'district_id' => null,
                'commune_id' => null,
                'address_detail' => null,
                'admin_id' => 0,
                'user_id' => $user->id,
                'active' => 0,
                'add_point_20' => 0
            ];

            // tạo giao dịch
            //    dd($this->transaction);
            $transaction = $this->transaction->create($dataTransactionCreate);
            // tạo các order của transaction
            $dataOrderCreate = [];

            $dataOrderCreate[] = [
                'name' => $product->name,
                'quantity' => 1,
                'new_price' => $totalPrice,
                'old_price' => $product->price,
                'avatar_path' => $product->avatar_path,
                'sale' => $product->sale,
                'product_id' => $product->id,
            ];
            // $pay = $product->pay;
            // $product->update([
            //     'pay' => $pay + $dataOrderCreate[0]['quantity'],
            // ]);

            //   dd($dataOrderCreate);
            // insert database in orders table by createMany
            $transaction->orders()->createMany($dataOrderCreate);

            // Đưa sản phẩm trong kho sang trạng thái đợi vận chuyển
            $dataStoreCreate = [
                "active" => 0,
                "type" => 2,
            ];

            $dataStoreCreate["transaction_id"] = $transaction->id;
            $orders = $transaction->orders;
            $listDataStoreCreate = [];
            foreach ($orders as $order) {
                $storeItem = $dataStoreCreate;
                $storeItem['quantity'] = -$order->quantity;
                $storeItem['product_id'] = $order->product_id;
                array_push($listDataStoreCreate, $storeItem);
            }
            //   dd($listDataStoreCreate);
            $transaction->stores()->createMany($listDataStoreCreate);






            DB::commit();
            return redirect()->route('profile.createMember')->with("alert", "Thêm thành viên thành công");
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('profile.createMember')->with("error", "Thêm thành viên không thành công");
        }
    }
    public function drawPoint(ValidateDrawPoint $request)
    {


        if (date('d') >= $this->datePay['start'] && date('d') <= $this->datePay['end']) {
            $user = auth()->guard('web')->user();
            if ($user->status == 2) {
                try {
                    DB::beginTransaction();


                    // Trừ điểm rút
                    $user->points()->create([
                        'type' => $this->typePoint[5]['type'],
                        'point' => -(float)$request->input('pay'),
                        'active' => 1,
                    ]);
                    $user->pays()->create([
                        'status' => $this->typePay[1]['type'],
                        'user_id' => $user->id,
                        'point' => (float)$request->input('pay'),
                        'active' => 1,
                    ]);

                    DB::commit();
                    return redirect()->route('profile.index')->with("alert", "Đã gửi thông tin rút điểm");
                } catch (\Exception $exception) {
                    DB::rollBack();
                    Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
                    return redirect()->route('profile.index')->with("error", "Gửi thông tin rút điểm không thành công");
                }
            } else {
                return redirect()->route('profile.editInfo')->with('drawPoint', 'Bạn phải hoàn thiện thông tin trước khi rút điểm');
            }
        } else {
            return;
        }
    }
    public function storeAddress(Request $request){
        try {
            DB::beginTransaction();
            $dataAddressCreate = [
                'name' => $request->input('name')??"",
                'phone' => $request->input('phone')??"",
                'email' => $request->input('email')??"",
                // 'default_address' => $request->input('default_address')??0,
                'city_id' => $request->input('city_id')??null,
                'district_id' => $request->input('district_id')??null,
                'commune_id' => $request->input('commune_id')??null,
                'address_detail' => $request->input('address_detail')??null,
                'user_id' => Auth::check() ? Auth::user()->id : 0,
            ];
            if($request->input('default_address')){
                $this->addressOfUser->where('user_id', Auth::user()->id)->where('default_address', 1)->update(['default_address' => 0]);
                $dataAddressCreate['default_address'] = 1;
            }else{
                $dataAddressCreate['default_address'] = 0;
            }

            $address = $this->addressOfUser->create($dataAddressCreate);
            //  dd($contact);
            DB::commit();
            return response()->json([
            "code" => 200,
            "html" => 'Thêm địa chỉ thành công',
            "message" => "success"
            ], 200);

        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                'html'=>'Thêm địa chỉ không thành công',
                "message" => "fail"
            ], 500);

        }
    }
    public function editAddress($id)
    {
        $address = $this->addressOfUser->find($id);
        $addressAll = new AddressHelper();
        $data = $this->city->orderby('name')->get();
        $cities = $addressAll->cities($data);
        if ($address) {
            return response()->json([
                "code" => 200,
                "html" => view('frontend.components.form-edit-address', [
                    'data' => $address, 
                    'cities' => $cities,
                    'type' => 'Địa chỉ'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
    public function updateAddress(Request $request, $id){
        try {
            DB::beginTransaction();
            $dataAddressUpdate = [
                'name' => $request->input('name')??"",
                'phone' => $request->input('phone')??"",
                'email' => $request->input('email')??"",
                'default_address' => $request->input('default_address')??0,
                'city_id' => $request->input('city_id')??null,
                'district_id' => $request->input('district_id')??null,
                'commune_id' => $request->input('commune_id')??null,
                'address_detail' => $request->input('address_detail')??null,
                'user_id' => Auth::check() ? Auth::user()->id : 0,
            ];
    
            if($request->input('default_address')){
                $this->addressOfUser->where('user_id', Auth::user()->id)->where('default_address', 1)->update(['default_address' => 0]);
                $dataAddressUpdate['default_address'] = 1;
            }else{
                $dataAddressUpdate['default_address'] = 0;
            }
            
            $this->addressOfUser->find($id)->update($dataAddressUpdate);
            $address = $this->addressOfUser->find($id);
            //  dd($contact);
            DB::commit();
            return response()->json([
            "code" => 200,
            "html" => 'Sửa địa chỉ thành công',
            "message" => "success"
            ], 200);

        } catch (\Exception $exception) {
            //throw $th;
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                'html'=>'Sửa địa chỉ không thành công',
                "message" => "fail"
            ], 500);

        }
    }
    public function loadAddress($id)
    {
        $user = auth()->guard('web')->user();
        $allAddress = $this->addressOfUser->where('user_id', $user->id)->get();

        // Cập nhật các bản ghi có default_address=0 cho user hiện tại thành default_address=1
        $this->addressOfUser->where('user_id', $user->id)->where('default_address', 1)->update(['default_address' => 0]);

        $address = $this->addressOfUser->find($id);
        $default_address = $address->default_address;
        if ($default_address) {
            $default_addressUpdate = 0;
        } else {
            $default_addressUpdate = 1;
        }
        $updateResult =  $address->update([
            'default_address' => $default_addressUpdate,
        ]);
        // dd($updateResult);
        $address   =  $this->addressOfUser->find($id);
        return redirect()->route('profile.address')->with("alert", "Đã thiết lập địa chỉ mặc định");
    }
    public function cartLoadAddress($id)
    {
        $user = auth()->guard('web')->user();
        $allAddress = $this->addressOfUser->where('user_id', $user->id)->get();

        // Cập nhật các bản ghi có default_address=0 cho user hiện tại thành default_address=1
        $this->addressOfUser->where('user_id', $user->id)->where('default_address', 1)->update(['default_address' => 0]);

        $address = $this->addressOfUser->find($id);
        $default_address = $address->default_address;
        if ($default_address) {
            $default_addressUpdate = 0;
        } else {
            $default_addressUpdate = 1;
        }
        $updateResult =  $address->update([
            'default_address' => $default_addressUpdate,
        ]);
        // dd($updateResult);
        $address   =  $this->addressOfUser->find($id);
        return redirect()->route('cart.list')->with("alert", "Đã thay đổi địa chỉ");
    }
    public function destroyAddress($id){
        return $this->deleteTrait($this->addressOfUser, $id);
    }
    
}
