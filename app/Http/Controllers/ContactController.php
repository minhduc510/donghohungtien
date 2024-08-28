<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //
    private $setting;
    private $contact;
    public function __construct(Setting $setting, Contact $contact)
    {
        /*$this->middleware('auth');*/
        $this->setting = $setting;
        $this->contact = $contact;
    }
    public function index()
    {
        $resultCheckLang = checkRouteLanguage2();
        if ($resultCheckLang) {
            return $resultCheckLang;
        }

        $ct = $this->setting->find(109);
        $dataAddress = $this->setting->find(111);
        // dd($dataAddress);
        $map = $this->setting->find(110);
        $breadcrumbs = [
            [
                'name' => __('home.lien_he'),
                'slug' => makeLinkToLanguage('contact', null, null, \App::getLocale()),
            ],
        ];



        return view("frontend.pages.contact", [

            'ct' => $ct,
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'contact',
            'title' =>  "Thông tin liên hệ",

            'seo' => [
                'title' => "Thông tin liên hệ",
                'keywords' =>  "Thông tin liên hệ",
                'description' =>   "Thông tin liên hệ",
                'image' =>  "",
                'abstract' =>  "Thông tin liên hệ",
            ],

            "dataAddress" => $dataAddress,
            "map" => $map,
        ]);
    }

    public function findStore(Request $request)
    {
        $resultCheckLang = checkRouteLanguage2();
        if ($resultCheckLang) {
            return $resultCheckLang;
        }

        $listSystem = $this->setting->where('active', 1)->where('parent_id', 324)->orderBy('order')->latest()->get();

        $dataAddress = $this->setting->find(109);
        $map = $this->setting->find(33);
        $breadcrumbs = [
            [
                'name' => __('Tìm cửa hàng'),
                'slug' => makeLinkToLanguage('find-store', null, null, \App::getLocale()),
            ],
        ];

        if ($request->ajax()) {

            if ($request->id_address) {
                $id_address = $request->id_address;
                $map_selected = $this->setting->find($id_address);

                $output = $map_selected->description;
                echo $output;
            }
        } else {
            return view("frontend.pages.tim-cua-hang", [

                'breadcrumbs' => $breadcrumbs,
                'listSystem' => $listSystem,
                'typeBreadcrumb' => 'find-store',
                'title' =>  "Tìm cửa hàng",

                'seo' => [
                    'title' => "Tìm cửa hàng",
                    'keywords' =>  "Tìm cửa hàng",
                    'description' =>   "Tìm cửa hàng",
                    'image' =>  "",
                    'abstract' =>  "Tìm cửa hàng",
                ],

                "dataAddress" => $dataAddress,
                "map" => $map,
            ]);
        }
    }


    public function storeAjax(Request $request)
    {
        try {
            DB::beginTransaction();
            $name = '';
            $noidung = '';
            $title = 'THÔNG TIN THÊM';
            $title2 = 'THÔNG TIN TƯ VẤN';
            if ($request->input('id')) {

                $name = '<br />' . '<b>Sản phẩm tư vấn: </b>' . $request->input('id');
            }
            if ($request->input('content')) {
                $noidung = '<br />' . 'Nội dung: ' . $request->input('content');
            } else {
                $noidung = ($request->input('title') ?? $title);
            }

            $dataContactCreate = [
                'name' => $request->input('name') ?? "",
                'phone' => $request->input('phone') ?? "",
                'email' => $request->input('email') ?? "",
                'active' => $request->input('active') ?? 1,
                'status' => 1,
                'city_id' => $request->input('city_id') ?? null,
                'district_id' => $request->input('district_id') ?? null,
                'commune_id' => $request->input('commune_id') ?? null,
                'address_detail' => $request->input('address_detail') ?? null,
                'content' => $noidung . $name,
                'title' => $request->input('title') ?? $title,
                'admin_id' => 0,
                'user_id' => Auth::check() ? Auth::user()->id : 0,
            ];

            // Giới tính: '.$request->input('sex').'<br>
            // Từ: '.$request->input('from').'<br>
            // Đến: '.$request->input('to').'<br>
            // Từ: '.$request->input('service').'<br>

            $contact = $this->contact->create($dataContactCreate);
            //  dd($contact);
            $mail = $this->setting->where('active', 1)->find(215);
            if ($mail && $mail->value != null) {
                Mail::to($mail->value)->send(new ContactEmail($contact));
            }
            DB::commit();
            return response()->json([
                "code" => 200,
                "html" => 'Gửi thông tin thành công',
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                'html' => 'Gửi thông tin không thành công',
                "message" => "fail"
            ], 500);
        }
    }

    public function storeAjax2(Request $request)
    {

        try {
            DB::beginTransaction();
            $title = 'THÔNG TIN LIÊN HỆ';
            $dataContactCreate = [
                'name' => $request->input('name') ?? "",
                'phone' => $request->input('phone') ?? "",
                'email' => $request->input('email') ?? "",
                'active' => $request->input('active') ?? 1,
                'status' => 1,
                'city_id' => $request->input('city_id') ?? null,
                'district_id' => $request->input('district_id') ?? null,
                'commune_id' => $request->input('commune_id') ?? null,
                'address_detail' => $request->input('address_detail') ?? null,
                'admin_id' => 0,
                'user_id' => Auth::check() ? Auth::user()->id : 0,
            ];
            if ($request->has('note') && $request->input('note') != null) {
                $dataContactCreate['content'] = ($request->input('title') ?? $title) . '<br> Ghi chú:' . $request->input('note') . '<br>' . $request->input('content');
            } else {
                $dataContactCreate['content'] = ($request->input('title') ?? $title) . 'Nội dung: ' . $request->input('content');
            }

            // Giới tính: '.$request->input('sex').'<br>
            // Từ: '.$request->input('from').'<br>
            // Đến: '.$request->input('to').'<br>
            // Từ: '.$request->input('service').'<br>

            $contact = $this->contact->create($dataContactCreate);
            //  dd($contact);
            DB::commit();
            return response()->json([
                "code" => 200,
                "html" => 'Gửi thông tin thành công',
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                'html' => 'Gửi thông tin không thành công',
                "message" => "fail"
            ], 500);
        }
    }

    public function storeAjax1(Request $request)
    {

        try {
            DB::beginTransaction();
            $title = 'ĐĂNG KÝ NGAY';
            $dataContactCreate = [
                'name' => $request->input('name') ?? "",
                'phone' => $request->input('phone') ?? "",
                'email' => $request->input('email') ?? "",
                'active' => $request->input('active') ?? 1,
                'status' => 1,
                'city_id' => $request->input('city_id') ?? null,
                'district_id' => $request->input('district_id') ?? null,
                'commune_id' => $request->input('commune_id') ?? null,
                'address_detail' => $request->input('address_detail') ?? null,
                'content' => ($request->input('title') ?? $title) . '
                <br />' . 'Nội dung: ' . $request->input('content2') . '
                <br />' . 'Sản phẩm: ' . $request->input('content') ?? '',
                'admin_id' => 0,
                'user_id' => Auth::check() ? Auth::user()->id : 0,
            ];

            // Giới tính: '.$request->input('sex').'<br>
            // Từ: '.$request->input('from').'<br>
            // Đến: '.$request->input('to').'<br>
            // Từ: '.$request->input('service').'<br>

            $contact = $this->contact->create($dataContactCreate);
            //  dd($contact);
            DB::commit();
            return response()->json([
                "code" => 200,
                "html" => 'Gửi thông tin thành công',
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                'html' => 'Gửi thông tin không thành công',
                "message" => "fail"
            ], 500);
        }
    }
}
