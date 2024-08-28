<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Code;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;
use Illuminate\Support\Facades\Storage;

class AdminCodeController extends Controller
{
    //
    use StorageImageTrait, DeleteRecordTrait;
    private $code;
    private $langConfig;
    private $langDefault;
    public function __construct(Code $code)
    {
        $this->code = $code;
        $this->langConfig = config('languages.supported');
        $this->langDefault = config('languages.default');
    }
    //
    public function index()
    {
        $data = $this->code->orderBy('order')->orderBy("created_at", "desc")->paginate(15);

        return view(
            "admin.pages.code.list",
            [
                'data' => $data
            ]
        );
    }
    public function create(Request $request = null)
    {
        return view(
            "admin.pages.code.add",
            [
                'request' => $request
            ]
        );
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataCodeCreate = [
                "name" => $request->name ?? '',
                'order' => $request->order,
                'description' => $request->description ?? '',
                "active" => $request->active,
            ];

            $code = $this->code->create($dataCodeCreate);

            DB::commit();
            return redirect()->route("admin.code.index")->with("alert", "Thêm  thành công");
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.code.index')->with("error", "Thêm  không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->code->find($id);
        return view("admin.pages.code.edit", [
            'data' => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataCodeUpdate = [
                "name" => $request->name ?? '',
                'order' => $request->order,
                'description' => $request->description ?? '',
                "active" => $request->active,
            ];

            $this->code->find($id)->update($dataCodeUpdate);

            DB::commit();
            return redirect()->route("admin.code.index")->with("alert", "Sửa  thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.code.index')->with("error", "Sửa  không thành công");
        }
    }
    public function destroy($id)
    {
        return $this->deleteTrait($this->code, $id);
    }
    public function loadOrder($id, $order)
    {
        $data = $this->code->find($id);

        try {
            DB::beginTransaction();



            DB::commit();
            return response()->json([
                "code" => 200,
                "html" => view()->render(),
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {

            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
    public function loadActive($id)
    {
        $code   =  $this->code->find($id);
        $active = $code->active;
        if ($active) {
            $activeUpdate = 0;
        } else {
            $activeUpdate = 1;
        }
        $updateResult =  $code->update([
            'active' => $activeUpdate,
        ]);
        $code   =  $this->code->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-active', ['data' => $code, 'type' => 'code'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
}
