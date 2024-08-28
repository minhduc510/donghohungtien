<?php

namespace App\Http\Controllers\Admin;

use App\Models\Key;
use App\Models\Post;
use App\Models\PostCate;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Traits\DeleteRecordTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelExportsDatabase;
use App\Imports\ExcelImportsDatabase;
use App\Models\CategoryPostTranslation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\ValidateAddCategoryPost;
use App\Http\Requests\Admin\ValidateEditCategoryPost;

class AdminCategoryPostController extends Controller
{
    use StorageImageTrait, DeleteRecordTrait;
    private $categoryPost;
    private $langConfig;
    private $categoryPostTranslation;
    private $langDefault;

    public function __construct(CategoryPost $categoryPost, CategoryPostTranslation $categoryPostTranslation)
    {
        $this->categoryPost = $categoryPost;
        $this->langConfig = config('languages.supported');
        $this->categoryPostTranslation = $categoryPostTranslation;
        $this->langDefault = config('languages.default');
    }
    //
    public function index(Request $request)
    {

        // getALlCategoryChildrenAndSelf
        $parentBr = null;
        if ($request->has('parent_id')) {
            $data = $this->categoryPost->where('parent_id', $request->input('parent_id'))->orderBy("order")->orderBy("created_at", "desc")->paginate(15);
            if ($request->input('parent_id')) {
                $parentBr = $this->categoryPost->find($request->input('parent_id'));
            }
        } else {
            $data = $this->categoryPost->where('parent_id', 0)->orderBy("order")->orderBy("created_at", "desc")->paginate(15);
        }
        if ($request->input('keyword')) {
            $idCatePostTran = $this->categoryPostTranslation->where('name', 'like', '%' . $request->input('keyword') . '%')
                ->pluck('category_id')
                ->toArray();
            $dataQuery = $this->categoryPost->whereIn('id', $idCatePostTran)
                ->orderBy("order")
                ->orderBy("created_at", "desc");
        } else {
            if ($request->has('parent_id')) {
                $dataQuery = $this->categoryPost->where('parent_id', $request->input('parent_id'))
                    ->orderBy("order")
                    ->orderBy("created_at", "desc");
            } else {
                $dataQuery = $this->categoryPost->where('parent_id', 0)
                    ->orderBy("order")
                    ->orderBy("created_at", "desc");
            }
        }
        $data = $dataQuery->paginate(15);
        $idcha = $request->input('parent_id');

        $caocho = $this->categoryPost->getALlCategoryChildrenAndSelf($idcha);
        $post_id = PostCate::whereIn('category_id', $caocho)->pluck('post_id')->toArray();


        $post_all = Post::whereIn('id', $post_id)->paginate(30);

        return view(
            "admin.pages.categorypost.list",
            [
                'data' => $data,
                'parentBr' => $parentBr,
                'post_all' => $post_all,
            ]
        );
    }
    public function create(Request $request)
    {
        if ($request->has("parent_id")) {
            $htmlselect = $this->categoryPost->getHtmlOptionAddWithParent($request->parent_id);
        } else {
            $htmlselect = $this->categoryPost->getHtmlOption();
        }
        $url = URL::to('/');
        return view(
            "admin.pages.categorypost.add",
            [
                'option' => $htmlselect,
                'url' => $url,
                'request' => $request
            ]
        );
    }
    public function store(ValidateAddCategoryPost $request)
    {
        try {
            DB::beginTransaction();
            $dataCategoryPostCreate = [
                //  "name" =>  $request->name,
                //   "slug" =>  $request->slug,
                //   "description" => $request->input('description'),
                //   "description_seo" => $request->input('description_seo'),
                //    "title_seo" => $request->input('title_seo'),
                //    "content" => $request->input('content'),
                "active" => $request->active,
                'color' => $request->color,
                'order' => $request->order,
                "parent_id" => $request->parent_id ? $request->parent_id : 0,
                "admin_id" => auth()->guard('admin')->id()
            ];

            $dataUploadIcon = $this->storageTraitUpload($request, "icon_path", "category-product");
            if (!empty($dataUploadIcon)) {
                $dataCategoryPostCreate["icon_path"] = $dataUploadIcon["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "category-product");
            if (!empty($dataUploadAvatar)) {
                $dataCategoryPostCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            $categoryPost = $this->categoryPost->create($dataCategoryPostCreate);

            // dd($categoryProduct);
            // insert data product lang
            $dataCategoryPostTranslation = [];
            foreach ($this->langConfig as $key => $value) {
                $itemCategoryPostTranslation = [];
                $itemCategoryPostTranslation['name'] = $request->input('name_' . $key);
                $itemCategoryPostTranslation['slug'] = $request->input('slug_' . $key);
                $itemCategoryPostTranslation['number'] = $request->input('number_' . $key);
                $itemCategoryPostTranslation['bonus'] = $request->input('bonus_' . $key);
                $itemCategoryPostTranslation['description'] = $request->input('description_' . $key);
                $itemCategoryPostTranslation['description_seo'] = $request->input('description_seo_' . $key);
                $itemCategoryPostTranslation['title_seo'] = $request->input('title_seo_' . $key);
                $itemCategoryPostTranslation['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemCategoryPostTranslation['content'] = $request->input('content_' . $key);
                $itemCategoryPostTranslation['language'] = $key;
                $dataCategoryPostTranslation[] = $itemCategoryPostTranslation;
            }
            //  dd($categoryProduct->translations());
            $categoryPostTranslation =   $categoryPost->translations()->createMany($dataCategoryPostTranslation);
            //  dd($categoryProductTranslation);
            //Thêm slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $itemKey = [];
                $itemKey['slug'] = $request->input('slug_' . $key);
                $itemKey['type'] = 1;
                $itemKey['language'] = $key;
                $itemKey['key_id'] = $categoryPost->id;
                $dataKey = Key::create($itemKey);
            }
            DB::commit();
            return redirect()->route("admin.categorypost.index", ['parent_id' => $request->parent_id])->with("alert", "Thêm danh mục bài viết thành công");
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.categorypost.index', ['parent_id' => $request->parent_id])->with("error", "Thêm danh mục bài viết không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->categoryPost->find($id);
        $parentId = $data->parent_id;
        $htmlselect = CategoryPost::getHtmlOptionEdit($parentId, $id);
        $url = URL::to('/');
        return view("admin.pages.categorypost.edit", [
            'option' => $htmlselect,
            'url' => $url,
            'data' => $data
        ]);
    }
    public function update(ValidateEditCategoryPost $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataCategoryPostUpdate = [
                "active" => $request->active,
                'color' => $request->color,
                'order' => $request->order,
                "parent_id" => $request->parent_id ? $request->parent_id : 0,
                "admin_id" => auth()->guard('admin')->id()
            ];
            //  dd($dataCategoryPostUpdate);
            $dataUpdateIcon = $this->storageTraitUpload($request, "icon_path", "category-post");
            if (!empty($dataUpdateIcon)) {
                $path = $this->categoryPost->find($id)->icon_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataCategoryPostUpdate["icon_path"] = $dataUpdateIcon["file_path"];
            }
            $dataUpdateAvatar = $this->storageTraitUpload($request, "avatar_path", "category-post");
            if (!empty($dataUpdateAvatar)) {
                $path = $this->categoryPost->find($id)->avatar_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataCategoryPostUpdate["avatar_path"] = $dataUpdateAvatar["file_path"];
            }
            $this->categoryPost->find($id)->update($dataCategoryPostUpdate);
            $categoryPost = $this->categoryPost->find($id);
            $dataCategoryPostTranslationUpdate = [];
            foreach ($this->langConfig as $key => $value) {
                $itemCategoryPostTranslationUpdate = [];
                $itemCategoryPostTranslationUpdate['name'] = $request->input('name_' . $key);
                $itemCategoryPostTranslationUpdate['slug'] = $request->input('slug_' . $key);
                $itemCategoryPostTranslationUpdate['number'] = $request->input('number_' . $key);
                $itemCategoryPostTranslationUpdate['bonus'] = $request->input('bonus_' . $key);
                $itemCategoryPostTranslationUpdate['description'] = $request->input('description_' . $key);
                $itemCategoryPostTranslationUpdate['description_seo'] = $request->input('description_seo_' . $key);
                $itemCategoryPostTranslationUpdate['title_seo'] = $request->input('title_seo_' . $key);
                $itemCategoryPostTranslationUpdate['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemCategoryPostTranslationUpdate['content'] = $request->input('content_' . $key);
                $itemCategoryPostTranslationUpdate['language'] = $key;
                //  dd($itemPostTranslationUpdate);
                //  dd($Post->translations($key)->first());
                if ($categoryPost->translationsLanguage($key)->first()) {
                    $categoryPost->translationsLanguage($key)->first()->update($itemCategoryPostTranslationUpdate);
                } else {
                    $categoryPost->translationsLanguage($key)->create($itemCategoryPostTranslationUpdate);
                }

                //  $dataPostTranslationUpdate[] = $itemPostTranslationUpdate;
                //   $dataPostTranslationUpdate[] = new PostTranslation($itemPostTranslationUpdate);
            }
            //Sửa slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $dataKey = Key::where('type', 1)->where('key_id', $categoryPost->id)->where('language', $key)->first();
                $itemKey = [];
                if ($dataKey) {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 1;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $categoryPost->id;
                } else {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 1;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $categoryPost->id;
                }

                if ($categoryPost->key($key)->first()) {
                    $categoryPost->key($key)->first()->update($itemKey);
                } else {
                    $categoryPost->key($key)->create($itemKey);
                }
            }
            DB::commit();
            return redirect()->route("admin.categorypost.index", ['parent_id' => $request->parent_id])->with("alert", "Sửa danh mục bài viết thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.categorypost.index', ['parent_id' => $request->parent_id])->with("error", "Sửa danh mục bài viết không thành công");
        }
    }
    public function destroy($id)
    {
        // Xóa tất cả các bản ghi trong bảng "key" có "key_id" trùng với "id" của sản phẩm
        Key::where([
            ['key_id', $id],
            ['type', 1]
        ])->delete();

        return $this->deleteCategoryRecusiveTrait($this->categoryPost, $id);
    }
    public function destroyCategoryPostAvatar($id)
    {
        return $this->deleteAvatarTrait($this->categoryPost, $id);
    }
    public function destroyCategoryPostIcon($id)
    {
        return $this->deleteIconTrait($this->categoryPost, $id);
    }
    public function excelExportDatabase()
    {
        return Excel::download(new ExcelExportsDatabase(config('excel_database.categoryPost')), config('excel_database.categoryPost.excelfile'));
    }
    public function excelImportDatabase()
    {
        $path = request()->file('fileExcel')->getRealPath();
        Excel::import(new ExcelImportsDatabase(config('excel_database.categoryPost')), $path);
    }


    public function loadActive($id)
    {
        $categoryPost = $this->categoryPost->find($id);
        $active = $categoryPost->active;
        if ($active) {
            $activeUpdate = 0;
        } else {
            $activeUpdate = 1;
        }
        $updateResult =  $categoryPost->update([
            'active' => $activeUpdate,
        ]);
        // dd($updateResult);
        $categoryPost  =  $this->categoryPost->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-active', ['data' => $categoryPost, 'type' => 'Danh mục'])->render(),
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
        $categoryPost   =  $this->categoryPost->find($id);
        $hot = $categoryPost->hot;

        if ($hot) {
            $hotUpdate = 0;
        } else {
            $hotUpdate = 1;
        }
        $updateResult =  $categoryPost->update([
            'hot' => $hotUpdate,
        ]);

        $categoryPost   =  $this->categoryPost->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-hot', ['data' => $categoryPost, 'type' => 'Danh mục'])->render(),
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
