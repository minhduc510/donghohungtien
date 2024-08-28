<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;
use App\Http\Requests\Admin\ValidateAddSetting;
use App\Http\Requests\Admin\ValidateEditSetting;
use Illuminate\Support\Facades\Storage;

class AdminSettingController extends Controller
{
    //
    use StorageImageTrait, DeleteRecordTrait;
    private $setting;
    private $langConfig;
    private $langDefault;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
        $this->langConfig = config('languages.supported');
        $this->langDefault = config('languages.default');
    }
    public function index(Request $request)
    {

        $parentBr = null;
        if ($request->has('parent_id')) {
            $data = $this->setting->where('parent_id', $request->input('parent_id'))->orderBy("order")->orderBy("created_at", "desc")->paginate(15);
            if ($request->input('parent_id')) {
                $parentBr = $this->setting->find($request->input('parent_id'));
            }
        } else {
            $data = $this->setting->where('parent_id', 0)->orderBy("order")->orderBy("created_at", "desc")->paginate(15);
        }

        //  dd(config('excel_database.category_product.title'));
        //  dd( view(
        //      "admin.pages.categoryproduct.list",
        //      [
        //          'data' => $data
        //      ]
        //  )->renderSections()['content']);
        return view(
            "admin.pages.setting.list",
            [
                'data' => $data,
                'parentBr' => $parentBr,
            ]
        );
    }
    public function create(Request $request)
    {
        if ($request->has("parent_id")) {
            $htmlselect = $this->setting->getHtmlOptionAddWithParent($request->parent_id);
        } else {
            $htmlselect = $this->setting->getHtmlOption();
        }
        return view(
            "admin.pages.setting.add",
            [
                'option' => $htmlselect,
                'request' => $request
            ]
        );
    }
    public function store(ValidateAddSetting $request)
    {
        try {
            DB::beginTransaction();
            $dataSettingCreate = [
                "active" => $request->active,
                'order' => $request->order,
                'color' => $request->color,
                "parent_id" => $request->parent_id ? $request->parent_id : 0,
                "admin_id" => auth()->guard('admin')->id()
            ];
            //   dd($dataSettingCreate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "image_path", "setting");
            if (!empty($dataUploadAvatar)) {
                $dataSettingCreate["image_path"] = $dataUploadAvatar["file_path"];
            }

            $dataUploadAvatar = $this->storageTraitUpload($request, "image_path2", "setting");
            if (!empty($dataUploadAvatar)) {
                $dataSettingCreate["image_path2"] = $dataUploadAvatar["file_path"];
            }

            $dataUploadAvatar = $this->storageTraitUpload($request, "icon_path", "setting");
            if (!empty($dataUploadAvatar)) {
                $dataSettingCreate["icon_path"] = $dataUploadAvatar["file_path"];
            }

            $setting = $this->setting->create($dataSettingCreate);
            // dd($setting);
            // insert data product lang
            $dataSettingTranslation = [];
            foreach ($this->langConfig as $key => $value) {
                $itemSettingTranslation = [];
                $itemSettingTranslation['name'] = $request->input('name_' . $key);
                $itemSettingTranslation['slug'] = $request->input('slug_' . $key);
                $itemSettingTranslation['description'] = $request->input('description_' . $key);
                $itemSettingTranslation['value'] = $request->input('value_' . $key);
                $itemSettingTranslation['price_ship'] = $request->input('price_ship_' . $key);
                $itemSettingTranslation['free_ship'] = $request->input('free_ship_' . $key);
                $itemSettingTranslation['language'] = $key;
                $dataSettingTranslation[] = $itemSettingTranslation;
            }
            //  dd($setting->translations());
            $settingTranslation =   $setting->translations()->createMany($dataSettingTranslation);
            //  dd($settingTranslation);
            DB::commit();
            return redirect()->route("admin.setting.index", ['parent_id' => $request->parent_id])->with("alert", "Thêm nội dung thành công");
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.setting.index', ['parent_id' => $request->parent_id])->with("error", "Thêm nội dung không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->setting->find($id);
        $parentId = $data->parent_id;
        $htmlselect = Setting::getHtmlOptionEdit($parentId, $id);
        return view("admin.pages.setting.edit", [
            'option' => $htmlselect,
            'data' => $data,
        ]);
    }
    public function update(ValidateEditSetting $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataSettingUpdate = [
                "active" => $request->active,
                'order' => $request->order,
                'color' => $request->color,
                "parent_id" => $request->parent_id ? $request->parent_id : 0,
                "admin_id" => auth()->guard('admin')->id()
            ];

            $dataUpdateAvatar = $this->storageTraitUpload($request, "image_path", "setting");
            if (!empty($dataUpdateAvatar)) {
                $path = $this->setting->find($id)->image_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataSettingUpdate["image_path"] = $dataUpdateAvatar["file_path"];
            }

            $dataUpdateAvatar = $this->storageTraitUpload($request, "image_path2", "setting");
            if (!empty($dataUpdateAvatar)) {
                $path = $this->setting->find($id)->image_path2;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataSettingUpdate["image_path2"] = $dataUpdateAvatar["file_path"];
            }

            $dataUpdateAvatar = $this->storageTraitUpload($request, "icon_path", "setting");
            if (!empty($dataUpdateAvatar)) {
                $path = $this->setting->find($id)->icon_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataSettingUpdate["icon_path"] = $dataUpdateAvatar["file_path"];
            }

            $this->setting->find($id)->update($dataSettingUpdate);
            $setting = $this->setting->find($id);
            $dataSettingTranslationUpdate = [];
            foreach ($this->langConfig as $key => $value) {
                $itemSettingTranslationUpdate = [];
                $itemSettingTranslationUpdate['name'] = $request->input('name_' . $key);
                $itemSettingTranslationUpdate['slug'] = $request->input('slug_' . $key);
                $itemSettingTranslationUpdate['description'] = $request->input('description_' . $key);
                $itemSettingTranslationUpdate['value'] = $request->input('value_' . $key);
                $itemSettingTranslationUpdate['price_ship'] = $request->input('price_ship_' . $key);
                $itemSettingTranslationUpdate['free_ship'] = $request->input('free_ship_' . $key);
                $itemSettingTranslationUpdate['language'] = $key;
                if ($setting->translationsLanguage($key)->first()) {
                    $setting->translationsLanguage($key)->first()->update($itemSettingTranslationUpdate);
                } else {
                    $setting->translationsLanguage($key)->create($itemSettingTranslationUpdate);
                }
            }
            DB::commit();
            return redirect()->route("admin.setting.index", ['parent_id' => $request->parent_id])->with("alert", "Sửa nội dung thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.setting.index', ['parent_id' => $request->parent_id])->with("error", "Sửa nội dung không thành công");
        }
    }
    public function destroy($id)
    {
        return $this->deleteCategoryRecusiveTrait($this->setting, $id);
    }
    public function destroySettingImage($id)
    {
        try {
            $path = $this->setting->find($id)->image_path;

            $this->setting->find($id)->update(['image_path' => null]);

            Storage::delete($this->makePathDelete($path));

            return response()->json([
                "code" => 200,
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
    public function destroySettingIcon($id)
    {
        try {
            $path = $this->setting->find($id)->icon_path;

            $this->setting->find($id)->update(['icon_path' => null]);

            Storage::delete($this->makePathDelete($path));

            return response()->json([
                "code" => 200,
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
    public function loadActive($id)
    {
        $setting   =  $this->setting->find($id);
        $active = $setting->active;
        if ($active) {
            $activeUpdate = 0;
        } else {
            $activeUpdate = 1;
        }
        $updateResult =  $setting->update([
            'active' => $activeUpdate,
        ]);
        $setting   =  $this->setting->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-active', ['data' => $setting, 'type' => 'setting'])->render(),
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
