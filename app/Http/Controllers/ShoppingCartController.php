<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Mail\TransactionEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\City;
use App\Models\District;
use App\Models\Commune;
use App\Models\User;

use App\Helper\AddressHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\Setting;
use Carbon\Carbon;

class ShoppingCartController extends Controller
{
    //

    private $product;
    private $order;
    private $cart;
    private $city;
    private $district;
    private $commune;
    private $transaction;
    private $unit;
    private $setting;
    public function __construct(Product $product, City $city, District $district, Commune $commune, Order $order, Transaction $transaction, Setting $setting)
    {
        $this->product = $product;
        $this->order = $order;
        $this->city = $city;
        $this->district = $district;
        $this->commune = $commune;
        $this->transaction = $transaction;
        $this->setting = $setting;
        $this->unit = "đ";
        $this->cartItems = session()->has('cart') ? session('cart') : [];
    }
    public function list()
    {
        $address = new AddressHelper();
        $data = $this->city->orderby('name')->get();
        $cities = $address->cities($data);
        //  dd($this->city->get());
        $this->cart = new CartHelper();
        $data = $this->cart->cartItems;
        $totalPrice = $this->cart->getTotalPrice();
        $totalOldPrice = $this->cart->getTotalOldPrice();

        $totalQuantity = $this->cart->getTotalQuantity();
        $vanchuyen = $this->setting->find(140);
        $thanhtoan = $this->setting->find(139);
        $chinhanh = $this->setting->find(143);
        // dd($data);
        return view('frontend.pages.cart', [
            'data' => $data,
            'cities' => $cities,
            'totalPrice' => $totalPrice,
            'totalQuantity' => $totalQuantity,
            'totalOldPrice' => $totalOldPrice,
            'vanchuyen' => $vanchuyen,
            'thanhtoan' => $thanhtoan,
            'chinhanh' => $chinhanh,
        ]);
    }

    public function saveData(Request $request)
    {
        $data = $request->all();
        Session::put('data_khach', $data);
        return response()->json(['message' => 'Dữ liệu đã được lưu.']);
    }

    public function checkout()
    {
        $address = new AddressHelper();
        $data = $this->city->orderby('name')->get();
        $cities = $address->cities($data);
        $this->cart = new CartHelper();
        $data = $this->cart->cartItems;
        $totalPrice = $this->cart->getTotalPrice();
        $totalOldPrice = $this->cart->getTotalOldPrice();

        $totalQuantity = $this->cart->getTotalQuantity();
        $vanchuyen = $this->setting->find(140);
        $httt = $this->setting->find(500);
        $thanhtoan = $this->setting->find(138);
        $chinhanh = $this->setting->find(143);
        $address = new AddressHelper();
        $data_city = $this->city->orderby('name')->get();
        $cities = $address->cities($data_city);
        $ct = $this->city->get();
        return view('frontend.pages.checkout', [
            'ct' => $ct,
            'data' => $data,
            'cities' => $cities,
            'totalPrice' => $totalPrice,
            'totalQuantity' => $totalQuantity,
            'totalOldPrice' => $totalOldPrice,
            'vanchuyen' => $vanchuyen,
            'thanhtoan' => $thanhtoan,
            'chinhanh' => $chinhanh,
            'httt' => $httt,
        ]);
    }

    public function add($id, Request $request)
    {
        $this->cart = new CartHelper();
        $quantity = $request->query('quantity') ?? 1;
        if ($request->has('quantity') && $request->input('quantity')) {
            $quantity = (int) $request->input('quantity');
            if ($quantity <= 0) {
                $quantity = 1;
            }
        }
        if ($request->has('option') && $request->input('option')) {
            // dd($this->product->mergeOption($request->input('option'))->where('products.id',$id)->get());
            $product = $this->product->join('options', 'products.id', '=', 'options.product_id')
                ->select('products.*', 'options.size as size', 'options.price as price', 'options.id as option_id')
                ->where('options.id', $request->input('option'))
                ->where('products.id', $id)
                ->first();
        } else {

            $product = $this->product->find($id);
        }
        //  dd($quantity);
        $data = [];
        $this->cart->add($product, $quantity, $request->ghichu ?? null);

        if (isset($this->cartItems[$id . '-0'])) {
            $data = $this->cartItems[$id . '-0'];
            $data['quantity'] += $quantity;
            $data['ghichu'] = $request->ghichu ?? null;
        } else {
            $data['name'] = $product->name;
            $data['price'] = $product->price * ((100 - $product->old_price) / 100);
            $data['avatar_path'] = $product->avatar_path;
            $data['quantity'] = 1;
            $data['ghichu'] = $request->ghichu ?? null;
        }
        $totalQuantity =  $this->cart->getTotalQuantity();
        return response()->json([
            'code' => 200,
            'messange' => 'success',
            'data' => $data,
            'totalQuantity' => $totalQuantity,
        ], 200);
    }
    public function buy($id, Request $request)
    {
        $quantity = $request->query('quantity') ?? 1;
        $this->cart = new CartHelper();

        $product = $this->product->find($id);

        $this->cart->add($product, $quantity);

        return redirect()->route("cart.list");
    }
    public function remove($id, Request $request)
    {
        $this->cart = new CartHelper();
        if ($request->option) {
            $this->cart->remove($id, $request->option);
        } else {
            $this->cart->remove($id);
        }

        $totalPrice = $this->cart->getTotalPrice();
        $totalQuantity = $this->cart->getTotalQuantity();
        $totalOldPrice = $this->cart->getTotalOldPrice();
        return response()->json([
            'code' => 200,
            'htmlcart' => view('frontend.components.cart-component', [
                'data' => $this->cart->cartItems,
                'totalPrice' => $totalPrice,
                'totalQuantity' => $totalQuantity,
                'totalOldPrice' => $totalOldPrice,
            ])->render(),
            'totalPrice' => number_format($totalPrice),
            'totalQuantity' => $totalQuantity,
            'messange' => 'success'
        ], 200);
    }
    public function update($id, Request $request)
    {
        $this->cart = new CartHelper();
        $quantity = $request->quantity;
        if ($request->option) {
            $this->cart->update($id, $quantity, $request->option);
        } else {
            $this->cart->update($id, $quantity);
        }

        $totalPrice = $this->cart->getTotalPrice();
        $totalQuantity = $this->cart->getTotalQuantity();
        $totalOldPrice = $this->cart->getTotalOldPrice();
        return response()->json([
            'code' => 200,
            'htmlcart' => view('frontend.components.cart-component', [
                'data' => $this->cart->cartItems,
                'totalPrice' => $totalPrice,
                'totalQuantity' => $totalQuantity,
                'totalOldPrice' => $totalOldPrice,
            ])->render(),
            'totalPrice' => number_format($totalPrice),
            'totalQuantity' => $totalQuantity,
            'messange' => 'success'
        ], 200);
    }
    public function clear()
    {
        $this->cart = new CartHelper();
        $this->cart->clear();
        $totalPrice = $this->cart->getTotalPrice();
        $totalQuantity = $this->cart->getTotalQuantity();
        $totalOldPrice = $this->cart->getTotalOldPrice();
        return response()->json([
            'code' => 200,
            'htmlcart' => view('frontend.components.cart-component', [
                'data' => $this->cart->cartItems,
                'totalPrice' => $totalPrice,
                'totalQuantity' => $totalQuantity,
                'totalOldPrice' => $totalOldPrice,
            ])->render(),
            'totalPrice' => $totalPrice,
            'totalQuantity' => $totalQuantity,
            'messange' => 'success'
        ], 200);
    }

    public function postOrder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => ['required', 'regex:/^(0|\+84)(\d{9,10})$/'],
            'email' => ['required', 'email', 'regex:/^[\w\.-]+@([\w-]+\.)+[\w-]{2,4}$/'],
        ], [
            'name.required' => 'Trường này không được để trống',
            'phone.required' => 'Trường này không được để trống',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.regex' => 'Email không đúng định dạng',
        ]);

        $this->cart = new CartHelper();
        $dataCart = $this->cart->cartItems;
        // dd($dataCart);
        if (!count($dataCart)) {
            return redirect()->route('cart.order.error')->with("error", "Đặt hàng không thành công! Bạn chưa chọn sản phẩm nào");
        }
        try {
            DB::beginTransaction();
            // dd( $dataCart);
            $totalPrice = $this->cart->getTotalPrice();
            $totalQuantity = $this->cart->getTotalQuantity();
            // $dataOrderCreate = [
            //     "quantity" => $request->input('quantity'),
            // ];
            $date = $request->input('date');
            $formattedDate = Carbon::parse($date)->format('d-m-Y');
            $note = $request->input('note') . '<br> <strong>
            Thời gian: 
            </strong>' . $formattedDate . ', ' . $request->input('time');
            $dataTransactionCreate = [
                'total' => $totalPrice,
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'note' => $note,
                'email' => $request->input('email'),
                'status' => 1,
                'city_id' => $request->input('city_id'),
                'district_id' => $request->input('district_id'),
                'commune_id' => $request->input('commune_id'),
                'address_detail' => $request->input('address_detail'),
                'httt' => $request->input('httt') ?? 145,
                'cn' => $request->input('cn'),
                'admin_id' => 0,
                'user_id' => Auth::check() ? Auth::user()->id : 0,
                'code' => makeCodeTransaction($this->transaction),
            ];
            //    dd($dataTransactionCreate);
            //  dd($this->transaction->create($dataTransactionCreate));
            $transaction = $this->transaction->create($dataTransactionCreate);

            //  dd( $transaction);
            $dataOrderCreate = [];
            foreach ($dataCart as $cart) {
                $dataOrderCreate[] = [
                    'name' => $cart['name'],
                    'quantity' => $cart['quantity'],
                    'new_price' => $cart['totalPriceOneItem'],
                    'old_price' => $cart['totalOldPriceOneItem'],
                    'avatar_path' => $cart['avatar_path'],
                    'sale' => $cart['sale'],
                    'size' => $cart['size'],
                    'option_id' => $cart['option_id'] ?? 0,
                    'product_id' => $cart['id'],
                    // 'note' => $cart['note'],
                ];
                $product = $this->product->find($cart['id']);
                $pay = $product->pay;
                $product->update([
                    'pay' => $pay + $cart['quantity'],
                ]);
            }
            //   dd($dataOrderCreate);
            // insert database in orders table by createMany
            $transaction->orders()->createMany($dataOrderCreate);

            $this->cart->clear();
            DB::commit();
            $mail = Setting::where('active', 1)->find(456);
            if ($mail) {
                Mail::to($mail->value)->send(new TransactionEmail($transaction));
            }
            return redirect()->route('cart.order.sucess', ['id' => $transaction->id])->with("sucess", "Đặt hàng thành công");
        } catch (\Exception $exception) {
            //throw $th;
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('cart.order.error')->with("error", "Đặt hàng không thành công");
        }
    }
    public function getOrderSuccess(Request $request)
    {
        $id = $request->id;
        $data = $this->transaction->find($id);
        return view('frontend.pages.order-sucess', [
            'data' => $data,
        ]);
    }

    public function getOrderError(Request $request)
    {
        $data = null;
        return view('frontend.pages.order-sucess', [
            'data' => $data,
        ]);
    }

    public function step2()
    {
        $address = new AddressHelper();
        $data = $this->city->orderby('name')->get();
        $cities = $address->cities($data);
        //  dd($this->city->get());
        $this->cart = new CartHelper();
        $data = $this->cart->cartItems;
        $totalPrice =  $this->cart->getTotalPrice();
        $totalOldPrice =  $this->cart->getTotalOldPrice();

        $totalQuantity =  $this->cart->getTotalQuantity();
        $vanchuyen = $this->setting->find(140);
        $thanhtoan = $this->setting->find(138);
        $chinhanh = $this->setting->find(143);
        $address = new AddressHelper();
        $data_city = $this->city->orderby('name')->get();
        $cities = $address->cities($data_city);
        $ct = $this->city->get();
        $dia_chi = Setting::where('active', 1)->find(93);
        $pttt1 = Setting::where('active', 1)->find(140);
        $pttt2 = Setting::where('active', 1)->find(139);
        // dd($ct);
        return view('frontend.pages.cart-step2', [
            'pttt1' => $pttt1,
            'pttt2' => $pttt2,
            'dia_chi' => $dia_chi,
            'ct' => $ct,
            'data' => $data,
            'cities' => $cities,
            'totalPrice' => $totalPrice,
            'totalQuantity' => $totalQuantity,
            'totalOldPrice' => $totalOldPrice,
            'vanchuyen' => $vanchuyen,
            'thanhtoan' => $thanhtoan,
            'chinhanh' => $chinhanh,
        ]);
    }
    public function step3(Request $request)
    {

        $ct = $this->city->where('id', $request->input('id_tinhthanh'))->first();
        $district = $this->district->where('id', $request->input('id_quanhuyen'))->first();
        // dd($request->id_quanhuyen);
        $data_khach = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'sdt' => $request->input('tel'),
            'id_tinhthanh' => $request->input('id_tinhthanh'),
            'id_quanhuyen' => $request->input('id_quanhuyen'),
            // 'tinhthanh'=> $ct->name,
            // 'quanhuyen'=>$district->name,
            'diachi' => $request->input('address'),
            'ghichu' => $request->input('addinfo'),
            'httt' => $request->input('httt'),
        ];
        // dd($data_khach);
        $address = new AddressHelper();
        $data = $this->city->orderby('name')->get();
        $cities = $address->cities($data);
        //  dd($this->city->get());
        $this->cart = new CartHelper();
        $data = $this->cart->cartItems;
        $totalPrice =  $this->cart->getTotalPrice();
        $totalOldPrice =  $this->cart->getTotalOldPrice();

        $totalQuantity =  $this->cart->getTotalQuantity();
        $vanchuyen = $this->setting->find(140);
        $thanhtoan = $this->setting->find(615);
        $chinhanh = $this->setting->find(143);
        return view('frontend.pages.cart-step3', [
            'data_khach' => $data_khach,
            'data' => $data,
            'cities' => $cities,
            'totalPrice' => $totalPrice,
            'totalQuantity' => $totalQuantity,
            'totalOldPrice' => $totalOldPrice,
            'vanchuyen' => $vanchuyen,
            'thanhtoan' => $thanhtoan,
            'chinhanh' => $chinhanh,
        ]);
    }
}
