<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryGalaxy;
use App\Models\Key;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Http\Requests\Admin\CategoryGalaxy\ValidateEditCategoryGalaxy;
use App\Http\Requests\Admin\CategoryGalaxy\ValidateAddCategoryGalaxy;
use App\Traits\DeleteRecordTrait;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Storage;

class AdminCategoryGalaxyController extends Controller
{
    use StorageImageTrait, DeleteRecordTrait;
    private $categoryGalaxy;
    private $langConfig;
    private $langDefault;

    public function __construct(CategoryGalaxy $categoryGalaxy)
    {
        $this->categoryGalaxy = $categoryGalaxy;
        $this->langConfig = config('languages.supported');
        $this->langDefault = config('languages.default');
    }
    //
    public function index(Request $request)
    {

        $parentBr = null;
        // if ($request->has('parent_id')) {
        //     $data = $this->categoryGalaxy->getALlModelAdminCategoryChildren($request->input('parent_id'));

        //     if ($request->input('parent_id')) {
        //         $parentBr = $this->categoryGalaxy->mergeLanguage(['name', 'slug'])->find($request->input('parent_id'));
        //         //$data = $this->categoryGalaxy->where('parent_id', $request->input('parent_id'))->orderBy("created_at", "desc")->paginate(15);
        //     }
        // } else {
        //     //  $data = $this->categoryGalaxy->where('parent_id',0)->orderBy("created_at", "desc")->paginate(15);
        //     $data = $this->categoryGalaxy->getALlModelAdminCategoryChildren(0);
        // }

        if ($request->has('parent_id')) {
            $data = $this->categoryGalaxy->where('parent_id', $request->input('parent_id'))->orderBy("order")->orderBy("created_at", "desc")->paginate(15);
            if ($request->input('parent_id')) {
                $parentBr = $this->categoryGalaxy->find($request->input('parent_id'));
            }
        } else {
            $data = $this->categoryGalaxy->where('parent_id', 0)->orderBy("order")->orderBy("created_at", "desc")->paginate(15);
        }


        // dd($data);
        return view(
            "admin.pages.categorygalaxy.list",
            [
                'data' => $data,
                'parentBr' => $parentBr,
            ]
        );
    }
    public function create(Request $request)
    {
        if ($request->has("parent_id")) {
            $htmlselect = $this->categoryGalaxy->getHtmlOptionAddWithParent($request->parent_id);
        } else {
            $htmlselect = $this->categoryGalaxy->getHtmlOption();
        }
        return view(
            "admin.pages.categorygalaxy.add",
            [
                'option' => $htmlselect,
                'request' => $request
            ]
        );
    }
    public function store(ValidateAddCategoryGalaxy $request)
    {
        try {
            DB::beginTransaction();
            $dataCategoryGalaxyCreate = [
                "active" => $request->active,
                'order' => $request->order,
                "parent_id" => $request->parent_id ? $request->parent_id : 0,
                "admin_id" => auth()->guard('admin')->id()
            ];

            $dataUploadIcon = $this->storageTraitUpload($request, "icon_path", "category-galaxy");
            if (!empty($dataUploadIcon)) {
                $dataCategoryGalaxyCreate["icon_path"] = $dataUploadIcon["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "category-galaxy");
            if (!empty($dataUploadAvatar)) {
                $dataCategoryGalaxyCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            $categoryGalaxy = $this->categoryGalaxy->create($dataCategoryGalaxyCreate);

            // dd($categoryProduct);
            // insert data product lang
            $dataCategoryGalaxyTranslation = [];
            foreach ($this->langConfig as $key => $value) {
                $itemCategoryGalaxyTranslation = [];
                $itemCategoryGalaxyTranslation['name'] = $request->input('name_' . $key);
                $itemCategoryGalaxyTranslation['slug'] = $request->input('slug_' . $key);
                $itemCategoryGalaxyTranslation['description'] = $request->input('description_' . $key);
                $itemCategoryGalaxyTranslation['description_seo'] = $request->input('description_seo_' . $key);
                $itemCategoryGalaxyTranslation['title_seo'] = $request->input('title_seo_' . $key);
                $itemCategoryGalaxyTranslation['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemCategoryGalaxyTranslation['content'] = $request->input('content_' . $key);
                $itemCategoryGalaxyTranslation['language'] = $key;
                $dataCategoryGalaxyTranslation[] = $itemCategoryGalaxyTranslation;
            }
            //  dd($categoryProduct->translations());
            $categoryGalaxyTranslation =   $categoryGalaxy->translations()->createMany($dataCategoryGalaxyTranslation);
            //  dd($categoryProductTranslation);
            //Thêm slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $itemKey = [];
                $itemKey['slug'] = $request->input('slug_' . $key);
                $itemKey['type'] = 5;
                $itemKey['language'] = $key;
                $itemKey['key_id'] = $categoryGalaxy->id;
                $dataKey = Key::create($itemKey);
            }
            DB::commit();
            return redirect()->route("admin.categorygalaxy.index", ['parent_id' => $request->parent_id])->with("alert", "Thêm danh mục galaxy thành công");
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.categorygalaxy.index', ['parent_id' => $request->parent_id])->with("error", "Thêm danh mục galaxy không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->categoryGalaxy->find($id);
        $parentId = $data->parent_id;
        $htmlselect = CategoryGalaxy::getHtmlOptionEdit($parentId, $id);
        return view("admin.pages.categorygalaxy.edit", [
            'option' => $htmlselect,
            'data' => $data
        ]);
    }
    public function update(ValidateEditCategoryGalaxy $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataCategoryGalaxyUpdate = [
                "active" => $request->active,
                'order' => $request->order,
                "parent_id" => $request->parent_id ? $request->parent_id : 0,
                "admin_id" => auth()->guard('admin')->id()
            ];
            //  dd($dataCategoryGalaxyUpdate);
            $dataUpdateIcon = $this->storageTraitUpload($request, "icon_path", "category-post");
            if (!empty($dataUpdateIcon)) {
                $path = $this->categoryGalaxy->find($id)->icon_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataCategoryGalaxyUpdate["icon_path"] = $dataUpdateIcon["file_path"];
            }
            $dataUpdateAvatar = $this->storageTraitUpload($request, "avatar_path", "category-post");
            if (!empty($dataUpdateAvatar)) {
                $path = $this->categoryGalaxy->find($id)->avatar_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataCategoryGalaxyUpdate["avatar_path"] = $dataUpdateAvatar["file_path"];
            }
            $this->categoryGalaxy->find($id)->update($dataCategoryGalaxyUpdate);
            $categoryGalaxy = $this->categoryGalaxy->find($id);
            $dataCategoryGalaxyTranslationUpdate = [];
            foreach ($this->langConfig as $key => $value) {
                $itemCategoryGalaxyTranslationUpdate = [];
                $itemCategoryGalaxyTranslationUpdate['name'] = $request->input('name_' . $key);
                $itemCategoryGalaxyTranslationUpdate['slug'] = $request->input('slug_' . $key);
                $itemCategoryGalaxyTranslationUpdate['description'] = $request->input('description_' . $key);
                $itemCategoryGalaxyTranslationUpdate['description_seo'] = $request->input('description_seo_' . $key);
                $itemCategoryGalaxyTranslationUpdate['title_seo'] = $request->input('title_seo_' . $key);
                $itemCategoryGalaxyTranslationUpdate['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemCategoryGalaxyTranslationUpdate['content'] = $request->input('content_' . $key);
                $itemCategoryGalaxyTranslationUpdate['language'] = $key;
                //  dd($itemPostTranslationUpdate);
                //  dd($Post->translations($key)->first());
                if ($categoryGalaxy->translationsLanguage($key)->first()) {
                    $categoryGalaxy->translationsLanguage($key)->first()->update($itemCategoryGalaxyTranslationUpdate);
                } else {
                    $categoryGalaxy->translationsLanguage($key)->create($itemCategoryGalaxyTranslationUpdate);
                }

                //  $dataPostTranslationUpdate[] = $itemPostTranslationUpdate;
                //   $dataPostTranslationUpdate[] = new PostTranslation($itemPostTranslationUpdate);
            }

            //Sửa slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $dataKey = Key::where('type', 5)->where('key_id', $categoryGalaxy->id)->where('language', $key)->first();
                $itemKey = [];
                if ($dataKey) {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 5;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $categoryGalaxy->id;
                } else {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 5;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $categoryGalaxy->id;
                }

                if ($categoryGalaxy->key($key)->first()) {
                    $categoryGalaxy->key($key)->first()->update($itemKey);
                } else {
                    $categoryGalaxy->key($key)->create($itemKey);
                }
            }

            DB::commit();
            return redirect()->route("admin.categorygalaxy.index", ['parent_id' => $request->parent_id])->with("alert", "Sửa danh mục bài viết thành công");
        } catch (\Exception $exception) {
            dd($exception);
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.categorygalaxy.index', ['parent_id' => $request->parent_id])->with("error", "Sửa danh mục bài viết không thành công");
        }
    }
    public function destroy($id)
    {
        $categoryGalaxy = $this->categoryGalaxy->findOrFail($id);

        // Xóa tất cả các bản ghi trong bảng "key" có "key_id" trùng với "id" của sản phẩm
        Key::where('key_id', $categoryGalaxy->id)->delete();
        return $this->deleteCategoryRecusiveTrait($this->categoryGalaxy, $id);
    }




    public function loadActive($id)
    {
        $categoryGalaxy = $this->categoryGalaxy->find($id);
        $active = $categoryGalaxy->active;
        if ($active) {
            $activeUpdate = 0;
        } else {
            $activeUpdate = 1;
        }
        $updateResult =  $categoryGalaxy->update([
            'active' => $activeUpdate,
        ]);
        // dd($updateResult);
        $categoryGalaxy  =  $this->categoryGalaxy->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-active', ['data' => $categoryGalaxy, 'type' => 'Danh mục'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function loadHot($id)
    {
        $categoryGalaxy   =  $this->categoryGalaxy->find($id);
        $hot = $categoryGalaxy->hot;

        if ($hot) {
            $hotUpdate = 0;
        } else {
            $hotUpdate = 1;
        }
        $updateResult =  $categoryGalaxy->update([
            'hot' => $hotUpdate,
        ]);

        $categoryGalaxy   =  $this->categoryGalaxy->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-hot', ['data' => $categoryGalaxy, 'type' => 'Danh mục'])->render(),
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
