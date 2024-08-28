<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//model
use App\Models\Key;
use App\Models\Galaxy;
use App\Models\GalaxyImage;
use App\Models\CategoryGalaxy;
use App\Models\GalaxyTranslation;
// support
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
//validate
use App\Http\Requests\Admin\Galaxy\ValidateAddGalaxy;
use App\Http\Requests\Admin\Galaxy\ValidateEditGalaxy;
//trait
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;

class AdminGalaxyController extends Controller
{
    use StorageImageTrait, DeleteRecordTrait;
    private $galaxy;
    private $galaxyImage;
    private $categoryGalaxy;
    private $htmlselect;

    private $langConfig;
    private $langDefault;

    public function __construct(
        Galaxy $galaxy,
        GalaxyImage $galaxyImage,
        CategoryGalaxy $categoryGalaxy,
        GalaxyTranslation $galaxyTranslation
    ) {
        $this->galaxy = $galaxy;
        $this->galaxyImage = $galaxyImage;
        $this->categoryGalaxy = $categoryGalaxy;
        $this->galaxyTranslation = $galaxyTranslation;
        $this->langConfig = config('languages.supported');
        $this->langDefault = config('languages.default');
    }
    //
    public function index(Request $request)
    {
        $data = $this->galaxy;
        if ($request->input('category')) {
            $categoryGalaxyId = $request->input('category');
            $idCategorySearch = $this->categoryGalaxy->getALlCategoryChildren($categoryGalaxyId);
            $idCategorySearch[] = (int)($categoryGalaxyId);
            $data = $data->whereIn('category_id', $idCategorySearch);
            $htmlselect = $this->categoryGalaxy->getHtmlOption($categoryGalaxyId);
        } else {
            $htmlselect = $this->categoryGalaxy->getHtmlOption();
        }
        $where = [];
        if ($request->input('keyword')) {
            // $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
            $data = $data->where(function ($query) {
                $idGalaxyTran = $this->galaxyTranslation->where([
                    ['name', 'like', '%' . request()->input('keyword') . '%']
                ])->pluck('galaxy_id');
                // dd($idProTran);
                $query->whereIn('id', $idGalaxyTran);
            });
        }
        if ($request->has('fill_action') && $request->input('fill_action')) {
            $key = $request->input('fill_action');
            switch ($key) {
                case 'hot':
                    $where[] = ['hot', '=', 1];
                    break;
                case 'noHot':
                    $where[] = ['hot', '=', 0];
                    break;
                default:
                    break;
            }
        }
        if ($where) {
            $data = $data->where($where);
        }
        if ($request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                case 'viewASC':
                    $orderby = [
                        'view',
                        'ASC'
                    ];
                    break;
                case 'viewDESC':
                    $orderby = [
                        'view',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby =  $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            $data = $data->orderBy(...$orderby);
        } else {
            $data = $data->orderBy("created_at", "DESC");
        }
        $data = $data->paginate(15);

        return view(
            "admin.pages.galaxy.list",
            [
                'data' => $data,
                'option' => $htmlselect,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
            ]
        );
    }


    public function create(Request $request = null)
    {
        $htmlselect = $this->categoryGalaxy->getHtmlOption();
        return view(
            "admin.pages.galaxy.add",
            [
                'option' => $htmlselect,
                'request' => $request
            ]
        );
    }
    public function store(ValidateAddGalaxy $request)
    {
        try {
            DB::beginTransaction();
            $dataGalaxyCreate = [
                "hot" => $request->input('hot') ?? 0,
                "view" => $request->input('view') ?? 0,
                "order" => $request->input('order') ?? 0,
                "active" => $request->input('active'),
                "category_id" => $request->input('category_id'),
                "admin_id" => auth()->guard('admin')->id()
            ];
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "galaxy");
            if (!empty($dataUploadAvatar)) {
                $dataGalaxyCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }
            // insert database in galaxys table
            $galaxy = $this->galaxy->create($dataGalaxyCreate);
            // dd($galaxy);
            // insert data product lang
            $dataGalaxyTranslation = [];
            //  dd($this->langConfig);
            foreach ($this->langConfig as $key => $value) {
                $itemGalaxyTranslation = [];
                $itemGalaxyTranslation['name'] = $request->input('name_' . $key);
                $itemGalaxyTranslation['slug'] = $request->input('slug_' . $key);
                $itemGalaxyTranslation['col'] = $request->input('col_' . $key)??'';
                $itemGalaxyTranslation['description'] = $request->input('description_' . $key);
                $itemGalaxyTranslation['description_seo'] = $request->input('description_seo_' . $key);
                $itemGalaxyTranslation['title_seo'] = $request->input('title_seo_' . $key);
                $itemGalaxyTranslation['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemGalaxyTranslation['content'] = $request->input('content_' . $key);
                $itemGalaxyTranslation['language'] = $key;
                //  dd($itemGalaxyTranslation);
                $dataGalaxyTranslation[] = $itemGalaxyTranslation;
            }

            // dd($dataGalaxyTranslation);
            // dd($galaxy->translations());
            $galaxyTranslation =   $galaxy->translations()->createMany($dataGalaxyTranslation);

            if ($request->hasFile("image")) {
                //
                $dataGalaxyImageCreate = [];
                foreach ($request->file('image') as $fileItem) {
                    $dataGalaxyImageDetail = $this->storageTraitUploadMutiple($fileItem, "galaxy");
                    $dataGalaxyImageCreate[] = [
                        "name" => $dataGalaxyImageDetail["file_name"],
                        "image_path" => $dataGalaxyImageDetail["file_path"]
                    ];
                }
                // insert database in product_images table by createMany
                $galaxy->images()->createMany($dataGalaxyImageCreate);
            }
            //Thêm slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $itemKey = [];
                $itemKey['slug'] = $request->input('slug_' . $key);
                $itemKey['type'] = 6;
                $itemKey['language'] = $key;
                $itemKey['key_id'] = $galaxy->id;
                $dataKey = Key::create($itemKey);
            }

            DB::commit();
            return redirect()->route('admin.galaxy.index')->with("alert", "Thêm galaxy thành công");
        } catch (\Exception $exception) {
            dd($exception);
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.galaxy.index')->with("error", "Thêm galaxy không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->galaxy->find($id);
        $category_id = $data->category_id;
        $htmlselect = $this->categoryGalaxy->getHtmlOption($category_id);
        return view("admin.pages.galaxy.edit", [
            'option' => $htmlselect,
            'data' => $data,
        ]);
    }

    public function destroyGalaxyImage($id)
    {
        return $this->deleteImageTrait($this->galaxyImage, $id);
    }
    public function destroyGalaxyAvatar($id)
    {
        // dd($id);
        return $this->deleteAvatarTrait($this->galaxy, $id);
    }

    public function update(ValidateEditGalaxy $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataGalaxyUpdate = [
                "order" => $request->input('order') ?? 0,
                "hot" => $request->input('hot') ?? 0,
                "active" => $request->input('active'),
                "category_id" => $request->input('category_id'),
                "admin_id" => auth()->guard('admin')->id(),
            ];
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "galaxy");
            if (!empty($dataUploadAvatar)) {
                $path = $this->galaxy->find($id)->avatar_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataGalaxyUpdate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            // insert database in galaxy table
            $this->galaxy->find($id)->update($dataGalaxyUpdate);
            $galaxy = $this->galaxy->find($id);

            // insert data product lang
            $dataGalaxyTranslationUpdate = [];
            foreach ($this->langConfig as $key => $value) {
                $itemGalaxyTranslationUpdate = [];
                $itemGalaxyTranslationUpdate['name'] = $request->input('name_' . $key);
                $itemGalaxyTranslationUpdate['slug'] = $request->input('slug_' . $key);
                $itemGalaxyTranslationUpdate['col'] = $request->input('col_' . $key)??'';
                $itemGalaxyTranslationUpdate['description'] = $request->input('description_' . $key);
                $itemGalaxyTranslationUpdate['description_seo'] = $request->input('description_seo_' . $key);
                $itemGalaxyTranslationUpdate['title_seo'] = $request->input('title_seo_' . $key);
                $itemGalaxyTranslationUpdate['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemGalaxyTranslationUpdate['content'] = $request->input('content_' . $key);
                $itemGalaxyTranslationUpdate['language'] = $key;

                if ($galaxy->translationsLanguage($key)->first()) {
                    $galaxy->translationsLanguage($key)->first()->update($itemGalaxyTranslationUpdate);
                } else {
                    $galaxy->translationsLanguage($key)->create($itemGalaxyTranslationUpdate);
                }
            }

            // insert database to product_images table
            if ($request->hasFile("image")) {
                //
                //   $product->images()->where("product_id", $id)->delete();
                $dataGalaxyImageUpdate = [];
                foreach ($request->file('image') as $fileItem) {
                    $dataGalaxyImageDetail = $this->storageTraitUploadMutiple($fileItem, "galaxy");
                    $itemImage = [
                        "name" => $dataGalaxyImageDetail["file_name"],
                        "image_path" => $dataGalaxyImageDetail["file_path"]
                    ];
                    $dataGalaxyImageUpdate[] = $itemImage;
                }
                // insert database in product_images table by createMany
                // dd($dataGalaxyImageUpdate);
                $galaxy->images()->createMany($dataGalaxyImageUpdate);
                //  dd($product->images);
            }
            //Sửa slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $dataKey = Key::where('type', 6)->where('key_id', $galaxy->id)->where('language', $key)->first();
                $itemKey = [];
                if ($dataKey) {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 6;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $galaxy->id;
                } else {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 6;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $galaxy->id;
                }

                if ($galaxy->key($key)->first()) {
                    $galaxy->key($key)->first()->update($itemKey);
                } else {
                    $galaxy->key($key)->create($itemKey);
                }
            }
            DB::commit();
            return redirect()->route('admin.galaxy.index')->with("alert", "sửa galaxy thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.galaxy.index')->with("error", "Sửa galaxy không thành công");
        }
    }
    public function destroy($id)
    {
        $galaxy = $this->galaxy->findOrFail($id);

        // Xóa tất cả các bản ghi trong bảng "key" có "key_id" trùng với "id" của galaxy
        Key::where('key_id', $galaxy->id)->delete();

        return $this->deleteTrait($this->galaxy, $id);
    }



    public function loadActive($id)
    {
        $galaxy   =  $this->galaxy->find($id);
        $active = $galaxy->active;
        if ($active) {
            $activeUpdate = 0;
        } else {
            $activeUpdate = 1;
        }
        $updateResult =  $galaxy->update([
            'active' => $activeUpdate,
        ]);
        $galaxy   =  $this->galaxy->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-active', ['data' => $galaxy, 'type' => 'bài viết'])->render(),
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
        $galaxy   =  $this->galaxy->find($id);
        $hot = $galaxy->hot;

        if ($hot) {
            $hotUpdate = 0;
        } else {
            $hotUpdate = 1;
        }
        $updateResult =  $galaxy->update([
            'hot' => $hotUpdate,
        ]);

        $galaxy   =  $this->galaxy->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-hot', ['data' => $galaxy, 'type' => 'Galaxy'])->render(),
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
