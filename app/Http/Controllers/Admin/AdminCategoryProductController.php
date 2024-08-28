<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\CategoryProductAttribute;
use App\Models\Attribute;
use App\Models\Key;
use App\Models\CategoryProductTranslation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Exports\ExcelExportsDatabase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImportsDatabase;


use App\Traits\StorageImageTrait;
use App\Http\Requests\Admin\ValidateEditCategoryProduct;
use App\Http\Requests\Admin\ValidateAddCategoryProduct;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductForCategory;
use App\Models\Setting;
use App\Models\Slider;
use App\Traits\DeleteRecordTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

//use PDF;
class AdminCategoryProductController extends Controller
{
    use StorageImageTrait, DeleteRecordTrait;
    private $categoryProduct;
    private $attribute;
    private $langConfig;
    private $langDefault;
    private $categoryProductTranslation;
    public function __construct(CategoryProduct $categoryProduct, Attribute $attribute, CategoryProductTranslation $categoryProductTranslation)
    {
        $this->categoryProduct = $categoryProduct;
        $this->attribute = $attribute;
        $this->categoryProductTranslation = $categoryProductTranslation;
        $this->langConfig = config('languages.supported');
        $this->langDefault = config('languages.default');
    }
    //
    public function index(Request $request)
    {

        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();

        $parentBr = null;
        if ($request->has('parent_id')) {
            $data = $this->categoryProduct->where('parent_id', $request->input('parent_id'))->orderBy("order")->orderBy("created_at", "desc")->limit(100)->get();
            if ($request->input('parent_id')) {
                $parentBr = $this->categoryProduct->find($request->input('parent_id'));
            }
        } else {
            $data = $this->categoryProduct->where('parent_id', 0)->orderBy("order")->orderBy("created_at", "desc")->paginate(15);
        }
        if ($request->input('keyword')) {
            $idCatePostTran = $this->categoryProductTranslation->where('name', 'like', '%' . $request->input('keyword') . '%')
                ->pluck('category_id')
                ->toArray();
            $dataQuery = $this->categoryProduct->whereIn('id', $idCatePostTran)
                ->orderBy("order")
                ->orderBy("created_at", "desc");
        } else {
            if ($request->has('parent_id')) {
                $dataQuery = $this->categoryProduct->where('parent_id', $request->input('parent_id'))
                    ->orderBy("order")
                    ->orderBy("created_at", "desc");
            } else {
                $dataQuery = $this->categoryProduct->where('parent_id', 0)
                    ->orderBy("order")
                    ->orderBy("created_at", "desc");
            }
        }
        $data = $dataQuery->paginate(15);
        $idcha = $request->input('parent_id');

        $caocho = $this->categoryProduct->getALlCategoryChildrenAndSelf($idcha);
        $product_id = ProductForCategory::whereIn('category_id', $caocho)->pluck('product_id')->toArray();



        $product_all = Product::whereIn('id', $product_id)->paginate(30);


        //  dd(config('excel_database.category_product.title'));
        //  dd( view(
        //      "admin.pages.categoryproduct.list",
        //      [
        //          'data' => $data
        //      ]
        //  )->renderSections()['content']);

        return view(
            "admin.pages.categoryproduct.list",
            [
                'data' => $data,
                'parentBr' => $parentBr,
                'product_all' => $product_all,
            ]
        );
    }
    public function create(Request $request)
    {
        $attributes = $this->attribute->where('parent_id', 0)->where('id', '!=', 157)->orderBy('order', 'asc')->get();
        if ($request->has("parent_id")) {
            $htmlselect = CategoryProduct::getHtmlOptionAddWithParent($request->parent_id);
        } else {
            $htmlselect = $this->categoryProduct->getHtmlOption();
        }
        $data = $this->attribute->where([
            ['parent_id', 0],
            ['active', 1]
        ])->get();
        $url = URL::to('/');
        return view(
            "admin.pages.categoryproduct.add",
            [
                'data' => $data,
                'attributes' => $attributes,
                'url' => $url,
                'option' => $htmlselect,
                'request' => $request
            ]
        );
    }
    public function store(ValidateAddCategoryProduct $request)
    {
        try {
            DB::beginTransaction();
            $dataCategoryProductCreate = [
                //  "name" =>  $request->name,
                //   "slug" =>  $request->slug,
                //   "description" => $request->input('description'),
                //   "description_seo" => $request->input('description_seo'),
                //    "title_seo" => $request->input('title_seo'),
                //    "content" => $request->input('content'),
                "active" => $request->active ?? 1,
                "hot" => $request->hot ?? 0,
                'color' => $request->color,
                "hot_2" => $request->hot_2 ?? 0,
                'order' => $request->order,
                "parent_id" => $request->parent_id ? $request->parent_id : 0,
                "admin_id" => auth()->guard('admin')->id()
            ];

            $dataUploadIcon = $this->storageTraitUpload($request, "icon_path", "category-product");
            if (!empty($dataUploadIcon)) {
                $dataCategoryProductCreate["icon_path"] = $dataUploadIcon["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "category-product");
            if (!empty($dataUploadAvatar)) {
                $dataCategoryProductCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            $dataUploadAvatar2 = $this->storageTraitUpload($request, "avatar_path2", "category-product");
            if (!empty($dataUploadAvatar2)) {
                $dataCategoryProductCreate["avatar_path2"] = $dataUploadAvatar2["file_path"];
            }

            //add upload video
            $dataUploadAvatar = $this->storageTraitUpload($request, "file", "category-product");
            if (!empty($dataUploadAvatar)) {
                $dataCategoryProductCreate["file"] = $dataUploadAvatar["file_path"];
            }
            // $dataUploadAvatar = $this->storageTraitUpload($request, "file2", "category-product");
            // if (!empty($dataUploadAvatar)) {
            //     $dataCategoryProductCreate["file2"] = $dataUploadAvatar["file_path"];
            // }
            // $dataUploadAvatar = $this->storageTraitUpload($request, "file3", "category-product");
            // if (!empty($dataUploadAvatar)) {
            //     $dataCategoryProductCreate["file3"] = $dataUploadAvatar["file_path"];
            // }
            //end

            // dd($dataCategoryProductCreate);

            $categoryProduct = $this->categoryProduct->create($dataCategoryProductCreate);

            if (isset($request->category_filter_attribute_menu) && count($request->category_filter_attribute_menu) > 0) {
                $categoryProduct->categoryFilterAttributeMenu()->attach($request->category_filter_attribute_menu);
            }

            // return $categoryProduct;

            // return $dataCategoryProductCreate;
            // dd($categoryProduct);
            // insert data product lang
            $dataCategoryProductTranslation = [];
            foreach ($this->langConfig as $key => $value) {
                $itemCategoryProductTranslation = [];
                $itemCategoryProductTranslation['name'] = $request->input('name_' . $key);
                $itemCategoryProductTranslation['slug'] = $request->input('slug_' . $key);
                $itemCategoryProductTranslation['description'] = $request->input('description_' . $key);
                $itemCategoryProductTranslation['description_seo'] = $request->input('description_seo_' . $key);
                $itemCategoryProductTranslation['title_seo'] = $request->input('title_seo_' . $key);
                $itemCategoryProductTranslation['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemCategoryProductTranslation['content'] = $request->input('content_' . $key);
                $itemCategoryProductTranslation['language'] = $key;
                $dataCategoryProductTranslation[] = $itemCategoryProductTranslation;
            }
            //  dd($categoryProduct->translations());

            if ($request->hasFile("image")) {
                //
                $dataProductImageCreate = [];
                foreach ($request->file('image') as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
                    $dataProductImageCreate[] = [
                        "name" => $dataProductImageDetail["file_name"],
                        "image_path" => $dataProductImageDetail["file_path"]
                    ];
                }
                // insert database in product_images table by createMany
                $categoryProductImage =   $categoryProduct->images()->createMany($dataProductImageCreate);
            }

            $categoryProductTranslation =   $categoryProduct->translations()->createMany($dataCategoryProductTranslation);
            //  dd($categoryProductTranslation);
            if ($request->has("category_product_attribute")) {
                $attr_ids = [];
                foreach ($request->input('category_product_attribute') as $attrItem) {
                    if ($attrItem) {
                        $attrInstance = $this->attribute->find($attrItem);
                        $attr_ids[] = $attrInstance->id;
                    }
                }
                //dd($product->proChilds()->attach($pro_parent_child_ids));
                $cate_attr = $categoryProduct->categoryAttributes()->attach($attr_ids);
            }
            //Thêm slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $itemKey = [];
                $itemKey['slug'] = $request->input('slug_' . $key);
                $itemKey['type'] = 3;
                $itemKey['language'] = $key;
                $itemKey['key_id'] = $categoryProduct->id;
                $dataKey = Key::create($itemKey);
            }
            //dd($itemKey);
            DB::commit();
            return redirect()->route("admin.categoryproduct.index", ['parent_id' => $request->parent_id])->with("alert", "Thêm danh mục sản phẩm thành công");
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.categoryproduct.index', ['parent_id' => $request->parent_id])->with("error", "Thêm danh mục sản phẩm không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->categoryProduct->find($id);
        $attributes = $this->attribute->where('parent_id', 0)->where('id', '!=', 157)->orderBy('order', 'asc')->get();
        $parentId = $data->parent_id;
        $htmlselect = CategoryProduct::getHtmlOptionEdit($parentId, $id);
        // return $data->file;
        $data_ed = $this->attribute->where([
            ['parent_id', 0],
            ['active', 1]
        ])->get();
        $categoryAttributeOfAdmin = CategoryProductAttribute::where('category_product_id', $data->id)->get()->pluck('attribute_id');
        $url = URL::to('/');
        return view("admin.pages.categoryproduct.edit", [
            'data_ed' => $data_ed,
            'attributes' => $attributes,
            'url' => $url,
            'categoryAttributeOfAdmin' => $categoryAttributeOfAdmin,
            'option' => $htmlselect,
            'data' => $data
        ]);
    }
    public function update(ValidateEditCategoryProduct $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataCategoryProductUpdate = [
                "active" => $request->active ?? 1,
                "hot" => $request->hot ?? 0,
                "hot_2" => $request->hot_2 ?? 0,
                'color' => $request->color,
                'order' => $request->order,
                "parent_id" => $request->parent_id ? $request->parent_id : 0,
                "admin_id" => auth()->guard('admin')->id()
            ];
            //  dd($dataCategoryProductUpdate);
            $dataUpdateIcon = $this->storageTraitUpload($request, "icon_path", "category-product");
            if (!empty($dataUpdateIcon)) {
                $path = $this->categoryProduct->find($id)->icon_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataCategoryProductUpdate["icon_path"] = $dataUpdateIcon["file_path"];
            }
            $dataUpdateAvatar = $this->storageTraitUpload($request, "avatar_path", "category-product");
            if (!empty($dataUpdateAvatar)) {
                $path = $this->categoryProduct->find($id)->avatar_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataCategoryProductUpdate["avatar_path"] = $dataUpdateAvatar["file_path"];
            }

            $dataUpdateAvatar2 = $this->storageTraitUpload($request, "avatar_path2", "category-product");
            if (!empty($dataUpdateAvatar2)) {
                $path = $this->categoryProduct->find($id)->avatar_path2;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataCategoryProductUpdate["avatar_path2"] = $dataUpdateAvatar2["file_path"];
            }

            // $dataUploadFile = $this->storageTraitUpload($request, "file", "category-product");
            // if (!empty($dataUploadFile)) {
            //     $path = $this->product->find($id)->file;
            //     if ($path) {
            //         Storage::delete($this->makePathDelete($path));
            //     }
            //     $dataCategoryProductUpdate["file"] = $dataUploadFile["file_path"];
            // }

            $dataUploadFile = $this->storageTraitUpload($request, "file", "category-product");
            if (!empty($dataUploadFile)) {
                $dataCategoryProductUpdate["file"] = $dataUploadFile["file_path"];
            }

            if ($request->input('deleteFile')) {
                $path1 = $this->categoryProduct->find($id)->file;

                if ($path1) {
                    $dataCategoryProductUpdate["file"] = null;
                }
            }

            // $dataUploadFile2 = $this->storageTraitUpload($request, "file2", "category-product");
            // if (!empty($dataUploadFile2)) {
            //     $path = $this->product->find($id)->file2;
            //     if ($path) {
            //         Storage::delete($this->makePathDelete($path));
            //     }
            //     $dataCategoryProductUpdate["file2"] = $dataUploadFile2["file_path"];
            // }

            // $dataUploadFile3 = $this->storageTraitUpload($request, "file3", "category-product");
            // if (!empty($dataUploadFile3)) {
            //     $path = $this->product->find($id)->file3;
            //     if ($path) {
            //         Storage::delete($this->makePathDelete($path));
            //     }
            //     $dataCategoryProductUpdate["file3"] = $dataUploadFile3["file_path"];
            // }

            // dd($dataCategoryProductCreate["file"]);

            // return $dataCategoryProductUpdate;

            $res = $this->categoryProduct->find($id)->update($dataCategoryProductUpdate);
            // dd($res);
            $categoryProduct = $this->categoryProduct->find($id);

            if (isset($request->category_filter_attribute_menu) && count($request->category_filter_attribute_menu) > 0) {
                $categoryProduct->categoryFilterAttributeMenu()->sync($request->category_filter_attribute_menu);
            }


            $dataCategoryProductTranslationUpdate = [];
            foreach ($this->langConfig as $key => $value) {
                $itemCategoryProductTranslationUpdate = [];
                $itemCategoryProductTranslationUpdate['name'] = $request->input('name_' . $key);
                $itemCategoryProductTranslationUpdate['slug'] = $request->input('slug_' . $key);
                $itemCategoryProductTranslationUpdate['description'] = $request->input('description_' . $key);
                $itemCategoryProductTranslationUpdate['description_seo'] = $request->input('description_seo_' . $key);
                $itemCategoryProductTranslationUpdate['title_seo'] = $request->input('title_seo_' . $key);
                $itemCategoryProductTranslationUpdate['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemCategoryProductTranslationUpdate['content'] = $request->input('content_' . $key);
                $itemCategoryProductTranslationUpdate['language'] = $key;
                //  dd($itemProductTranslationUpdate);
                //  dd($product->translations($key)->first());
                if ($categoryProduct->translationsLanguage($key)->first()) {
                    $categoryProduct->translationsLanguage($key)->first()->update($itemCategoryProductTranslationUpdate);
                } else {
                    $categoryProduct->translationsLanguage($key)->create($itemCategoryProductTranslationUpdate);
                }


                //  $dataProductTranslationUpdate[] = $itemProductTranslationUpdate;
                //   $dataProductTranslationUpdate[] = new ProductTranslation($itemProductTranslationUpdate);
            }
            if ($request->has("category_product_attribute")) {
                $attr_ids = [];
                foreach ($request->input('category_product_attribute') as $attrItem) {
                    if ($attrItem) {
                        $attrInstance = $this->attribute->find($attrItem);
                        $attr_ids[] = $attrInstance->id;
                    }
                }
                //dd($product->proChilds()->attach($pro_parent_child_ids));
                $cate_attr = $categoryProduct->categoryAttributes()->sync($attr_ids);
            }
            //Sửa slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $dataKey = Key::where('type', 3)->where('key_id', $categoryProduct->id)->where('language', $key)->first();
                $itemKey = [];
                if ($dataKey) {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 3;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $categoryProduct->id;
                } else {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 3;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $categoryProduct->id;
                }

                if ($categoryProduct->key($key)->first()) {
                    $categoryProduct->key($key)->first()->update($itemKey);
                } else {
                    $categoryProduct->key($key)->create($itemKey);
                }
            }



            DB::commit();
            return redirect()->route("admin.categoryproduct.index", ['parent_id' => $request->parent_id])->with("alert", "Sửa danh mục sản phẩm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            dd($exception);
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.categoryproduct.index', ['parent_id' => $request->parent_id])->with("error", "Sửa danh mục sản phẩm không thành công");
        }
    }
    public function destroy($id)
    {
        Key::where([
            ['key_id', $id],
            ['type', 3]
        ])->delete();

        $categoryProduct = $this->categoryProduct->find($id);

        if (isset($categoryProduct)) {
            $categoryProduct->categoryFilterAttributeMenu()->detach();
        }

        return $this->deleteCategoryRecusiveTrait($this->categoryProduct, $id);
    }
    public function destroyCategoryProductAvatar($id)
    {
        return $this->deleteAvatarTrait($this->categoryProduct, $id);
    }
    public function destroyCategoryProductIcon($id)
    {
        return $this->deleteIconTrait($this->categoryProduct, $id);
    }
    public function excelExportDatabase()
    {
        return Excel::download(new ExcelExportsDatabase(config('excel_database.categoryProduct')), config('excel_database.categoryProduct.excelfile'));
    }
    public function excelImportDatabase()
    {
        $path = request()->file('fileExcel')->getRealPath();
        Excel::import(new ExcelImportsDatabase(config('excel_database.categoryProduct')), $path);
    }
    public function loadOrder($id, $order)
    {
        $data = $this->categoryProduct->find($id);

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
        $categoryProduct = $this->categoryProduct->find($id);
        $active = $categoryProduct->active;
        if ($active) {
            $activeUpdate = 0;
        } else {
            $activeUpdate = 1;
        }
        $updateResult =  $categoryProduct->update([
            'active' => $activeUpdate,
        ]);
        // dd($updateResult);
        $categoryProduct  =  $this->categoryProduct->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-active', ['data' => $categoryProduct, 'type' => 'Danh mục'])->render(),
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
        $categoryProduct   =  $this->categoryProduct->find($id);
        $hot = $categoryProduct->hot;

        if ($hot) {
            $hotUpdate = 0;
        } else {
            $hotUpdate = 1;
        }
        $updateResult =  $categoryProduct->update([
            'hot' => $hotUpdate,
        ]);

        $categoryProduct   =  $this->categoryProduct->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-hot', ['data' => $categoryProduct, 'type' => 'sản phẩm'])->render(),
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
