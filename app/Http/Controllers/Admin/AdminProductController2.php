<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;
use App\Models\CategoryProduct;
use App\Models\CategoryPost;
use App\Models\ProductImage;
use App\Models\PostCate;
use App\Models\ProductPost;
use App\Models\Tag;
use App\Models\ProductTag;
use App\Models\ProductStar;
use App\Models\ProductTranslation;
use App\Models\Attribute;
use App\Models\Supplier;
use App\Models\Option;
use App\Models\Size;
use App\Models\Key;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ValidateAddProduct;
use App\Http\Requests\Admin\ValidateEditProduct;
use Illuminate\Support\Facades\URL;
use App\Exports\ExcelExportsDatabase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImportsDatabase;
use App\Models\ProductCate;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\App;
use Image;

class AdminProductController extends Controller
{
    //
    use StorageImageTrait, DeleteRecordTrait;
    private $product;
    private $productStar;
    private $categoryProduct;
    private $categoryPost;
    private $htmlselect;
    private $productImage;
    private $tag;
    private $option;
    private $size;
    private $post;
    private $productTag;
    private $productTranslation;
    private $supplier;
    private $attribute;
    private $langConfig;
    private $langDefault;

    public function __construct(
        ProductTranslation $productTranslation,
        Product $product,
        Post $post,
        ProductStar $productStar,
        CategoryProduct $categoryProduct,
        CategoryPost $categoryPost,
        ProductImage $productImage,
        Tag $tag,
        ProductTag $productTag,
        Attribute $attribute,
        Supplier $supplier,
        Option $option,
        Size $size
    ) {
        $this->product = $product;
        $this->post = $post;
        $this->productStar = $productStar;
        $this->categoryProduct = $categoryProduct;
        $this->productImage = $productImage;
        $this->categoryPost = $categoryPost;
        $this->tag = $tag;
        $this->productTag = $productTag;
        $this->productTranslation = $productTranslation;
        $this->attribute = $attribute;
        $this->supplier = $supplier;
        $this->option = $option;
        $this->size = $size;
        $this->langConfig = config('languages.supported');
        $this->langDefault = config('languages.default');
    }
    //
    public function index(Request $request)
    {
        //   dd(App::getLocale());
        $totalProduct = $this->product->all()->count();
        $data = $this->product;
        if ($request->input('category')) {
            $categoryProductId = $request->input('category');
            $idCategorySearch = $this->categoryProduct->getALlCategoryChildren($categoryProductId);
            $idCategorySearch[] = (int)($categoryProductId);
            $data = $data->whereIn('category_id', $idCategorySearch);
            $htmlselect = $this->categoryProduct->getHtmlOption($categoryProductId);
        } else {
            $htmlselect = $this->categoryProduct->getHtmlOption();
        }
        $where = [];
        $orWhere = null;
        if ($request->input('keyword')) {

            $data = $data->where(function ($query) {
                $idProTran = $this->productTranslation->where([
                    ['name', 'like', '%' . request()->input('keyword') . '%']
                ])->pluck('product_id');
                // dd($idProTran);
                $query->whereIn('id', $idProTran)->orWhere([
                    ['masp', 'like', '%' . request()->input('keyword') . '%']
                ]);
            });
            // $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
            // $orWhere = ['masp', 'like', '%' . $request->input('keyword') . '%'];
        }
        if ($request->has('fill_action') && $request->input('fill_action')) {
            $key = $request->input('fill_action');

            switch ($key) {
                case 'hot':
                    $where[] = ['hot', '=', 1];
                    break;
                case 'no_hot':
                    $where[] = ['hot', '=', 0];
                    break;
                case 'active':
                    $where[] = ['active', '=', 1];
                    break;
                case 'no_active':
                    $where[] = ['active', '=', 0];
                    break;
                default:
                    break;
            }
        }
        if ($where) {
            $data = $data->where($where);
        }
        //  dd($orWhere);
        if ($orWhere) {
            $data = $data->orWhere(...$orWhere);
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
                case 'priceASC':
                    $orderby = [
                        'price',
                        'ASC'
                    ];
                    break;
                case 'priceDESC':
                    $orderby = [
                        'price',
                        'DESC'
                    ];
                    break;
                case 'payASC':
                    $orderby = [
                        'pay',
                        'ASC'
                    ];
                    break;
                case 'payDESC':
                    $orderby = [
                        'pay',
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
        //  dd($this->product->select('*', \App\Models\Store::raw('Sum(quantity) as total')->whereRaw('products.id','stores.product_id'))->orderBy('total')->paginate(15));
        //  dd($data->get()->first()->name);
        $data = $data->paginate(15);

        return view(
            "admin.pages.product.list",
            [
                'data' => $data,
                'totalProduct' => $totalProduct,
                'option' => $htmlselect,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
            ]
        );
    }

    public function loadActive($id)
    {
        $product   =  $this->product->find($id);
        $active = $product->active;
        if ($active) {
            $activeUpdate = 0;
        } else {
            $activeUpdate = 1;
        }
        $updateResult =  $product->update([
            'active' => $activeUpdate,
        ]);
        // dd($updateResult);
        $product   =  $this->product->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-active', ['data' => $product, 'type' => 'sản phẩm'])->render(),
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
        $product   =  $this->product->find($id);
        $hot = $product->hot;

        if ($hot) {
            $hotUpdate = 0;
        } else {
            $hotUpdate = 1;
        }
        $updateResult =  $product->update([
            'hot' => $hotUpdate,
        ]);

        $product   =  $this->product->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-hot', ['data' => $product, 'type' => 'sản phẩm'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function loadPromotional($id)
    {
        $product   =  $this->product->find($id);
        $hot = $product->sale;

        if ($hot) {
            $hotUpdate = 0;
        } else {
            $hotUpdate = 1;
        }
        $updateResult =  $product->update([
            'sale' => $hotUpdate,
        ]);

        $product   =  $this->product->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-promotional', ['data' => $product, 'type' => 'sản phẩm'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function create(Request $request = null)
    {
        $htmlselect = $this->categoryProduct->getHtmlOption();
        $data = $this->categoryProduct->where('parent_id', 0)->orderBy("order")->get();
        $id_catePost = $this->categoryPost->getALlCategoryChildrenAndSelf(86);
        $id_post = PostCate::whereIn('category_id', $id_catePost)->pluck('post_id')->toArray();
        $post = $this->post->whereIn('id', $id_post)->where('active', 1)->get();
        $attributes = $this->attribute->where('parent_id', 0)->get();
        $supplier = $this->supplier->all();
        $url = URL::to('/');

        return view(
            "admin.pages.product.add",
            [
                'data' => $data,
                'post' => $post,
                'url' => $url,
                'option' => $htmlselect,
                'attributes' => $attributes,
                'supplier' => $supplier,
                'request' => $request
            ]
        );
    }
    public function store(ValidateAddProduct $request)
    {
        try {
            DB::beginTransaction();
            $category_id = [];
            $category_id = $request->input('category');
            if ($request->has('status')) {
                $active = $request->status;
            } else {
                $active = $request->active;
            }
            $dataProductCreate = [
                "masp" => $request->input('masp'),
                "price" => $request->input('price') ?? 0,
                "old_price" => $request->input('old_price') ?? 0,
                "size" => $request->input('size') ?? null,
                "sale" => $request->input('sale') ?? 0,
                "hot" => $request->input('hot') ?? 0,
                "sp_ngoc" => $request->input('sp_ngoc') ?? 0,
                "order" => $request->input('order') ?? null,
                "file3" => $request->input('file3') ?? null,
                // "pay"=>$request->input('pay'),
                // "number"=>$request->input('number'),
                "warranty" => $request->input('warranty') ?? 0,
                "view" => $request->input('view') ?? 0,
                "active" => $active,
                // "category_id" => $request->input('category_id'),
                "category_id" => $category_id[0],
                "supplier_id" => $request->input('supplier_id') ?? 0,
                "admin_id" => auth()->guard('admin')->id()
            ];
            //    dd($dataProductCreate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "product");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            $dataUploadAvatar = $this->storageTraitUpload($request, "file", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["file"] = $dataUploadAvatar["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "file2", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["file2"] = $dataUploadAvatar["file_path"];
            }

            // $dataUploadAvatar = $this->storageTraitUpload($request, "file3", "file");
            // if (!empty($dataUploadAvatar)) {
            //     $dataProductCreate["file3"] = $dataUploadAvatar["file_path"];
            // }
            // dd($dataProductCreate);
            // insert database in product table
            $product = $this->product->create($dataProductCreate);





            if ($request->has("category")) {
                $category_ids = [];
                //dd($category_ids);
                foreach ($request->input('category') as $categoryItem) {
                    if ($categoryItem) {
                        $categoryInstance = $this->categoryProduct->find($categoryItem);
                        $category_ids[] = $categoryInstance->id;
                    }
                }
                //dd($category_ids);

                $product_cate = $product->productscate()->attach($category_ids);
            }




            if ($request->has("post_id")) {
                // $category_ids = [];
                //dd($category_ids);
                foreach ($request->input('post_id') as $postId) {
                    DB::table('product_posts')->insert([
                        'post_id' => $postId,
                        'product_id' => $product->id,
                    ]);
                }
                // dd($product);


            }
            // insert data product lang
            $dataProductTranslation = [];
            foreach ($this->langConfig as $key => $value) {
                $itemProductTranslation = [];
                $itemProductTranslation['name'] = $request->input('name_' . $key);
                $itemProductTranslation['slug'] = $request->input('slug_' . $key);
                $itemProductTranslation['description'] = $request->input('description_' . $key);
                $itemProductTranslation['description_seo'] = $request->input('description_seo_' . $key);
                $itemProductTranslation['title_seo'] = $request->input('title_seo_' . $key);
                $itemProductTranslation['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemProductTranslation['content'] = $request->input('content_' . $key);
                //add
                $itemProductTranslation['content2'] = $request->input('content2_' . $key);
                $itemProductTranslation['content3'] = $request->input('content3_' . $key);
                $itemProductTranslation['content4'] = $request->input('content4_' . $key);
                $itemProductTranslation['model'] = $request->input('model_' . $key);
                $itemProductTranslation['tinhtrang'] = $request->input('tinhtrang_' . $key);
                $itemProductTranslation['baohanh'] = $request->input('baohanh_' . $key);
                $itemProductTranslation['xuatsu'] = $request->input('xuatsu_' . $key);

                $itemProductTranslation['language'] = $key;
                $dataProductTranslation[] = $itemProductTranslation;
            }
            //Thêm slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $itemKey = [];
                $itemKey['slug'] = $request->input('slug_' . $key);
                $itemKey['type'] = 4;
                $itemKey['language'] = $key;
                $itemKey['key_id'] = $product->id;
                $dataKey = Key::create($itemKey);
            }
            //    dd($dataProductTranslation);
            $productTranslation =   $product->translations()->createMany($dataProductTranslation);
            //  dd($productTranslation);
            // insert database to product_images table
            // if ($request->hasFile("image")) {
            //     //
            //     $dataProductImageCreate = [];
            //     foreach ($request->file('image') as $key => $fileItem) {
            //         $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
            //         $dataProductImageCreate[] = [
            //             "name" => $dataProductImageDetail["file_name"],
            //             "image_path" => $dataProductImageDetail["file_path"],
            //             "order" => $key+1
            //         ];
            //     }
            //     // insert database in product_images table by createMany
            //     $productImage =   $product->images()->createMany($dataProductImageCreate);
            // }

            // dd(explode(',', $request->input('image_path')));
            $arrImage = explode(',', $request->input('image_path'));
            $arrImage = array_filter($arrImage, function ($value) {
                return $value !== '';
            });

            if ($arrImage) {
                //
                $dataProductImageCreate = [];
                foreach ($arrImage as $key => $fileItem) {
                    $dataProductImageCreate[] = [
                        "name" => $fileItem,
                        "image_path" => $fileItem,
                        "order" => $key + 1
                    ];
                }
                // insert database in product_images table by createMany
                $productImage =   $product->images()->createMany($dataProductImageCreate);
            }


            // insert attribute to product
            if ($request->has("attribute")) {
                $attribute_ids = [];
                foreach ($request->input('attribute') as $attributeItem) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $attributeItem,
                    ]);
                }
            }
            // insert database to product_tags table
            foreach ($this->langConfig as $key => $value) {
                if ($request->has("tags_" . $key)) {
                    $tag_ids = [];
                    foreach ($request->input('tags_' . $key) as $tagItem) {
                        $tagInstance = $this->tag->firstOrCreate(["name" => $tagItem]);
                        $tag_ids[] = $tagInstance->id;
                    }
                    $product->tags()->attach($tag_ids, ['language' => $key]);
                }
            }

            if ($request->has("priceOption")) {
                //
                $dataProductOptionCreate = [];
                foreach ($request->input('priceOption') as $key => $value) {
                    if ($value || $request->input('sizeOption')[$key] || $request->input('old_priceOption')[$key]) {
                        $dataProductOptionCreate[] = [
                            "price" => $request->input('priceOption')[$key],
                            "old_price" =>  $request->input('old_priceOption')[$key],
                            "size" =>  $request->input('sizeOption')[$key],
                        ];
                    }
                }
                //   dd($dataProductAnswerCreate);
                // insert database in product_images table by createMany
                $product->options()->createMany($dataProductOptionCreate);
            }

            DB::commit();
            return redirect()->route('admin.product.index')->with("alert", "Thêm sản phẩm thành công");
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.index')->with("error", "Thêm sản phẩm không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->product->find($id);
        $attributes = $this->attribute->where('parent_id', 0)->get();
        //   dd($data->tagsLanguage('vi')->get());
        $category_id = $data->category_id;
        $htmlselect = $this->categoryProduct->getHtmlOption($category_id);
        $data_ed = $this->categoryProduct->where('parent_id', 0)->orderBy("order")->get();

        $id_catePost = $this->categoryPost->getALlCategoryChildrenAndSelf(86);
        $id_post = PostCate::whereIn('category_id', $id_catePost)->pluck('post_id')->toArray();
        $post = $this->post->whereIn('id', $id_post)->where('active', 1)->get();


        $post_check = ProductPost::where('product_id', $data->id)->get()->pluck('post_id');
        $categoryProductOfAdmin = ProductCate::where('product_id', $data->id)->get()->pluck('category_id');
        $attribuliOfAdmin = ProductAttribute::where('product_id', $data->id)->pluck('attribute_id');
        $supplier = $this->supplier->all();
        $url = URL::to('/');
        return view("admin.pages.product.edit", [
            'data_ed' => $data_ed,
            'post' => $post,
            'post_check' => $post_check,
            'url' => $url,
            'categoryProductOfAdmin' => $categoryProductOfAdmin,
            'attribuliOfAdmin' => $attribuliOfAdmin,
            'option' => $htmlselect,
            'data' => $data,
            'attributes' => $attributes,
            'supplier' => $supplier
        ]);
    }
    public function update(ValidateEditProduct $request, $id)
    {
        // dd($request->input('deleted_image_ids'));
        try {
            DB::beginTransaction();
            $category_id = [];
            $category_id = $request->input('category');
            if ($request->has('status')) {
                $active = $request->status;
            } else {
                $active = $request->active ? $request->active : 0;
            }
            $dataProductUpdate = [
                "masp" => $request->input('masp') ?? null,
                "price" => $request->input('price') ?? 0,
                "old_price" => $request->input('old_price') ?? 0,
                "size" => $request->input('size') ?? null,
                "sale" => $request->input('sale') ?? 0,
                "hot" => $request->input('hot') ?? 0,
                "sp_ngoc" => $request->input('sp_ngoc') ?? 0,
                "order" => $request->input('order') ?? null,
                "file3" => $request->input('file3') ?? null,
                // "pay"=>$request->input('pay'),
                // "number"=>$request->input('number'),
                "warranty" => $request->input('warranty') ?? 0,
                "view" => $request->input('view') ?? 0,
                "active" => $active,
                // "category_id" => $request->input('category_id'),
                "category_id" => $category_id[0],
                "supplier_id" => $request->input('supplier_id') ?? 0,
                "admin_id" => auth()->guard('admin')->id()
            ];
            // dd( $dataProductUpdate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "product");
            if (!empty($dataUploadAvatar)) {
                $path = $this->product->find($id)->avatar_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataProductUpdate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            $dataUploadFile = $this->storageTraitUpload($request, "file", "file");
            if (!empty($dataUploadFile)) {
                $path = $this->product->find($id)->file;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataProductUpdate["file"] = $dataUploadFile["file_path"];
            }

            $dataUploadFile2 = $this->storageTraitUpload($request, "file2", "file");
            if (!empty($dataUploadFile2)) {
                $path = $this->product->find($id)->file2;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataProductUpdate["file2"] = $dataUploadFile2["file_path"];
            }

            // $dataUploadFile3 = $this->storageTraitUpload($request, "file3", "file");
            // if (!empty($dataUploadFile3)) {
            //     $path = $this->product->find($id)->file3;
            //     if ($path) {
            //         Storage::delete($this->makePathDelete($path));
            //     }
            //     $dataProductUpdate["file3"] = $dataUploadFile3["file_path"];
            // }

            // insert database in product table
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);




            if ($request->has("category")) {
                $category_ids = [];
                //dd($category_ids);
                foreach ($request->input('category') as $categoryItem) {
                    if ($categoryItem) {
                        $categoryInstance = $this->categoryProduct->find($categoryItem);
                        $category_ids[] = $categoryInstance->id;
                    }
                }
                //dd($category_ids);
                $product_cate = $product->productscate()->sync($category_ids);
            }

            if ($request->has("post_id")) {

                foreach ($request->input('post_id') as $postId) {
                    DB::table('product_posts')->insert([
                        'post_id' => $postId,
                        'product_id' => $product->id,
                    ]);
                }
                // dd($product);


            }

            // insert data product lang
            $dataProductTranslationUpdate = [];
            foreach ($this->langConfig as $key => $value) {
                $itemProductTranslationUpdate = [];
                $itemProductTranslationUpdate['name'] = $request->input('name_' . $key);
                $itemProductTranslationUpdate['slug'] = $request->input('slug_' . $key);
                $itemProductTranslationUpdate['description'] = $request->input('description_' . $key);
                $itemProductTranslationUpdate['description_seo'] = $request->input('description_seo_' . $key);
                $itemProductTranslationUpdate['title_seo'] = $request->input('title_seo_' . $key);
                $itemProductTranslationUpdate['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemProductTranslationUpdate['content'] = $request->input('content_' . $key);

                //add
                $itemProductTranslationUpdate['content2'] = $request->input('content2_' . $key);
                $itemProductTranslationUpdate['content3'] = $request->input('content3_' . $key);
                $itemProductTranslationUpdate['content4'] = $request->input('content4_' . $key);
                $itemProductTranslationUpdate['model'] = $request->input('model_' . $key);
                $itemProductTranslationUpdate['tinhtrang'] = $request->input('tinhtrang_' . $key);
                $itemProductTranslationUpdate['baohanh'] = $request->input('baohanh_' . $key);
                $itemProductTranslationUpdate['xuatsu'] = $request->input('xuatsu_' . $key);

                $itemProductTranslationUpdate['language'] = $key;
                //  dd($itemProductTranslationUpdate);
                //  dd($product->translations($key)->first());
                if ($product->translationsLanguage($key)->first()) {
                    $product->translationsLanguage($key)->first()->update($itemProductTranslationUpdate);
                } else {
                    $product->translationsLanguage($key)->create($itemProductTranslationUpdate);
                }
                //  $dataProductTranslationUpdate[] = $itemProductTranslationUpdate;
                //   $dataProductTranslationUpdate[] = new ProductTranslation($itemProductTranslationUpdate);
            }
            //    dd($product->translations);
            //   $productTranslation =   $product->translations()->saveMany($dataProductTranslationUpdate);
            //  $productTranslation =   $product->translations()->createMany($dataProductTranslationUpdate);

            // dd($product->translations);

            //Sửa slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $dataKey = Key::where('type', 4)->where('key_id', $product->id)->where('language', $key)->first();
                $itemKey = [];
                if ($dataKey) {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 4;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $product->id;
                } else {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 4;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $product->id;
                }

                if ($product->key($key)->first()) {
                    $product->key($key)->first()->update($itemKey);
                } else {
                    $product->key($key)->create($itemKey);
                }
            }
            // insert attribute to product
            ProductAttribute::where('product_id', $product->id)->delete();
            if ($request->has("attribute")) {
                $attribute_ids = [];
                foreach ($request->input('attribute') as $attributeItem) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $attributeItem,
                    ]);
                }
            }

            // insert database to product_images table
            // if ($request->hasFile("image")) {
            //     //
            //     //   $product->images()->where("product_id", $id)->delete();
            //     $dataProductImageUpdate = [];
            //     foreach ($request->file('image') as $fileItem) {
            //         $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
            //         $itemImage = [
            //             "name" => $dataProductImageDetail["file_name"],
            //             "image_path" => $dataProductImageDetail["file_path"]
            //         ];
            //         $dataProductImageUpdate[] = $itemImage;
            //     }
            //     // insert database in product_images table by createMany
            //     // dd($dataProductImageUpdate);
            //     $product->images()->createMany($dataProductImageUpdate);
            //     //  dd($product->images);
            // }
            // dd($request->index);
            if ($request->has('index')) {
                ProductImage::where('product_id', $product->id)->delete();
                $dataProductImageUpdate1 = [];
                $arr1 = $request->input('index');
                // dd($arr1);
                foreach ($arr1 as $key => $fileItem) {
                    $itemImage = [
                        "name" => $fileItem,
                        "image_path" => $fileItem,
                        "order" => $key
                    ];
                    $dataProductImageUpdate1[] = $itemImage;
                }
                $product->images()->createMany($dataProductImageUpdate1);
            }
            if ($request->has('file_xx')) {
                $dataProductImageUpdate = [];
                $arr = $request->input('file_xx');
                // dd($arr);
                foreach ($arr as $key => $fileItem) {
                    $itemImage = [
                        "name" => $fileItem,
                        "image_path" => $fileItem,
                        "order" => $key
                    ];
                    $dataProductImageUpdate[] = $itemImage;
                }
                ProductImage::where('product_id', $product->id)->delete();
                $product->images()->createMany($dataProductImageUpdate);
            }
            if ($request->has('deleted_image_ids')) {
                $deletedImageIds = $request->input('deleted_image_ids');
                // dd($deletedImageIds);
                ProductImage::whereIn('id', $deletedImageIds)->delete();
            }
            //  dd($product->images);
            // insert database to product_tags table
            $tag_ids = [];
            foreach ($this->langConfig as $key => $value) {

                if ($request->has("tags_" . $key)) {
                    foreach ($request->input('tags_' . $key) as $tagItem) {
                        $tagInstance = $this->tag->firstOrCreate(["name" => $tagItem]);
                        $tag_ids[$tagInstance->id] = ['language' => $key];
                    }
                    //   $product->tags()->attach($tag_ids, ['language' => $key]);
                    // Các syncphương pháp chấp nhận một loạt các ID để ra trên bảng trung gian. Bất kỳ ID nào không nằm trong mảng đã cho sẽ bị xóa khỏi bảng trung gian.
                }
            }
            // dd($tag_ids);
            $product->tags()->sync($tag_ids);
            //  dd($product->tags);
            // end update tag

            if ($request->has("priceOption")) {
                //
                $dataProductOptionCreate = [];
                foreach ($request->input('priceOption') as $key => $value) {
                    if ($value || $request->input('sizeOption')[$key] || $request->input('old_priceOption')[$key]) {
                        $dataProductOptionCreate[] = [
                            "price" => $request->input('priceOption')[$key],
                            "old_price" => $request->input('old_priceOption')[$key],
                            "size" =>  $request->input('sizeOption')[$key],
                        ];
                    }
                }
                //   dd($dataProductAnswerCreate);
                // insert database in product_images table by createMany
                $product->options()->createMany($dataProductOptionCreate);
            }

            if ($request->has("idOption")) {
                //
                foreach ($request->input('idOption') as $key => $value) {
                    if ($value && ($request->input('priceOptionOld')[$key] || $request->input('sizeOptionOld')[$key] || $request->input('old_priceOptionOld')[$key])) {
                        $option = $this->option->find($value);
                        if ($option) {
                            $dataProductOptionUpdate = [
                                "price" => $request->input('priceOptionOld')[$key],
                                "old_price" => $request->input('old_priceOptionOld')[$key],
                                "size" =>  $request->input('sizeOptionOld')[$key],
                            ];
                            $option->update($dataProductOptionUpdate);
                        }
                    }
                }
            }
            //Sửa slug vào bảng key

            DB::commit();
            return redirect()->back()->with("alert", "Sửa sản phẩm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->back()->with("error", "Sửa sản phẩm không thành công");
        }
    }

    public function loadOptionProduct(Request $request)
    {
        $dataView = ['i' => $request->i];
        return response()->json([
            "code" => 200,
            "html" =>  view('admin.components.load-option-product', $dataView)->render(),
            "message" => "success"
        ], 200);
    }

    //Size

    public function listProductSize($product_id, $option_id, Request $request)
    {

        $data = $this->size->where('option_id', $option_id)->get();

        return view(
            "admin.pages.product.size-list",
            [
                'data' => $data,
                'option_id' => $option_id,
                'product_id' => $product_id,
            ]
        );
    }


    public function addProductSize($product_id, $option_id, Request $request = null)
    {
        $htmlselect = $this->categoryProduct->getHtmlOption();
        $attributes = $this->attribute->find(2);
        $supplier = $this->supplier->all();
        return view(
            "admin.pages.product.size-add",
            [
                'option' => $htmlselect,
                'product_id' => $product_id,
                'attributes' => $attributes,
                'option_id' => $option_id,
                'request' => $request
            ]
        );
    }

    public function sizeStore(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataProductSizeCreate = [
                "size" => $request->input('size'),
                "price" => $request->input('price'),
                "old_price" => $request->input('old_price'),
                "product_id" => $request->input('product_id'),
                "option_id" => $request->input('option_id'),
                "size_id" => $request->input('attribute'),
                "stock" => $request->input('stock'),
                "active" => $request->input('active') ?? 0,
                "order" => $request->input('order') ?? null,
                "is_default" => $request->input('is_default') ?? 0,
                "admin_id" => auth()->guard('admin')->id()

            ];
            //    dd($dataProductCreate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_type", "product");
            if (!empty($dataUploadAvatar)) {
                $dataProductSizeCreate["avatar_type"] = $dataUploadAvatar["file_path"];
            }

            // dd($dataProductCreate);
            // insert database in product table
            $size = $this->size->create($dataProductSizeCreate);
            // insert data product lang

            DB::commit();
            return redirect()->route('admin.product.size', ['product_id' => $request->input('product_id'), 'option_id' => $request->input('option_id')])->with("alert", "Thêm size sản phẩm thành công");
        } catch (\Exception $exception) {

            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.size', ['product_id' => $request->input('product_id'), 'option_id' => $request->input('option_id')])->with("error", "Thêm size sản phẩm không thành công");
        }
    }


    public function editProductSize($id)
    {
        $data = $this->size->find($id);
        $attributes = $this->attribute->find(2);
        return view("admin.pages.product.size-edit", [
            'data' => $data,
            'attributes' => $attributes,
        ]);
    }

    public function updateProductSize(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductSizeUpdate = [
                "size" => $request->input('size'),
                "price" => $request->input('price'),
                "old_price" => $request->input('old_price'),
                "product_id" => $request->input('product_id'),
                "option_id" => $request->input('option_id'),
                "stock" => $request->input('stock'),
                "active" => $request->input('active') ?? 0,
                "order" => $request->input('order') ?? null,
                "is_default" => $request->input('is_default') ?? 0,
                "admin_id" => auth()->guard('admin')->id()
            ];
            // dd( $dataProductUpdate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_type", "product");
            if (!empty($dataUploadAvatar)) {
                $path = $this->size->find($id)->avatar_type;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataProductSizeUpdate["avatar_type"] = $dataUploadAvatar["file_path"];
            }


            // insert database in product table
            $this->size->find($id)->update($dataProductSizeUpdate);

            $size = $this->size->find($id);


            DB::commit();
            return redirect()->route('admin.product.size', ['product_id' => $request->input('product_id'), 'option_id' => $request->input('option_id')])->with("alert", "Sửa size sản phẩm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.size', ['product_id' => $request->input('product_id'), 'option_id' => $request->input('option_id')])->with("error", "Sửa size sản phẩm không thành công");
        }
    }

    public function loadActiveSize($id)
    {
        $size = $this->size->find($id);
        $active = $size->active;
        if ($active) {
            $activeUpdate = 0;
        } else {
            $activeUpdate = 1;
        }
        $updateResult =  $size->update([
            'active' => $activeUpdate,
        ]);
        // dd($updateResult);
        $size = $this->size->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-active', ['data' => $size, 'type' => 'size'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function loadDefaultSize($id)
    {
        $size = $this->size->find($id);
        $is_default = $size->is_default;

        if ($is_default) {
            $defaultUpdate = 0;
        } else {
            $defaultUpdate = 1;
        }
        $updateResult =  $size->update([
            'is_default' => $defaultUpdate,
        ]);

        $size = $this->size->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-default', ['data' => $size, 'type' => 'size'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function destroySize($id)
    {
        return $this->deleteTrait($this->size, $id);
    }

    //End Size

    public function destroy($id)
    {
        Key::where('key_id', $id)->delete();
        return $this->deleteTrait($this->product, $id);
    }


    public function destroyProductAvatar($id)
    {
        return $this->deleteImage($this->product, $id, $path_name = 'avatar_path');
    }
    public function destroyProductImage($id)
    {
        return $this->deleteImageTrait($this->productImage, $id, $path_name = 'image_path');
    }



    public function excelExportDatabase()
    {
        return Excel::download(new ExcelExportsDatabase(config('excel_database.product')), config('excel_database.product.excelfile'));
    }
    public function excelImportDatabase()
    {
        $path = request()->file('fileExcel')->getRealPath();
        Excel::import(new ExcelImportsDatabase(config('excel_database.product')), $path);
    }


    public function destroyOptionProduct($id)
    {
        return $this->deleteTrait($this->option, $id);
    }


    //Hàm phần đánh giá
    public function indexStar(Request $request)
    {

        $data = $this->productStar->latest()->paginate(20);
        return view(
            "admin.pages.star.index",
            [
                'data' => $data,
            ]
        );
    }

    public function activeStar($id)
    {
        $data   =  $this->productStar::findOrFail($id);
        $active = $data->active;
        if (!$active) {
            $activeUpdate = 1;
        } else {
            return;
        }
        $updateResult =  $data->update([
            'active' => $activeUpdate,
        ]);
        // dd($updateResult);

        $data =  $this->productStar::findOrFail($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.pages.star.load-change-active-star', ['data' => $data, 'routeActive' => 'admin.product.activeStar'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function destroyStar($id)
    {
        return $this->deleteTrait($this->productStar, $id);
    }
    public function coppy($id)
    {
        $data = $this->product->find($id);
        $attributes = $this->attribute->where('parent_id', 0)->get();
        $category_id = $data->category_id;
        $htmlselect = $this->categoryProduct->getHtmlOption($category_id);
        $supplier = $this->supplier->all();
        return view("admin.pages.product.coppy", [
            'option' => $htmlselect,
            'data' => $data,
            'attributes' => $attributes,
            'supplier' => $supplier
        ]);
    }

    public function updateCoppy(ValidateAddProduct $request, $id)
    { {
            // dd($request->all());
            // $supplier=$this->supplier->findOrFail($request->input('supplier_id'));

            try {
                DB::beginTransaction();
                $category_id = [];
                $category_id = $request->input('category');
                $dataProductCreate = [
                    "masp" => $request->input('masp'),
                    "value" => $request->input('value'),
                    "is_sell" => $request->input('is_sell') ?? 0,
                    "is_buy" => $request->input('is_buy') ?? 0,
                    "type" => $request->input('type'),
                    "part_number" => $request->input('part_number'),
                    "unit" => $request->input('unit'),
                    "type_price" => $request->input('type_price'),
                    "name_po" => $request->input('name_po'),

                    "ma_vach" => $request->input('ma_vach'),
                    "xuat_su" => $request->input('xuat_su'),
                    "warranty" => $request->input('warranty'),
                    "ngung_san_xuat" => $request->input('ngung_san_xuat'),
                    "description_ban_hang" => $request->input('description_ban_hang'),
                    "description_nb" => $request->input('description_nb'),
                    "video" => $request->input('video'),


                    "price" => $request->input('price') ?? 0,
                    "old_price" => $request->input('old_price') ?? 0,
                    "capital" => $request->input('capital') ?? 0,
                    "size" => $request->input('size') ?? null,
                    "sale" => $request->input('sale') ?? 0,
                    "hot" => $request->input('hot') ?? 0,
                    "sp_ngoc" => $request->input('sp_ngoc') ?? 0,
                    "order" => $request->input('order') ?? null,
                    "file3" => $request->input('file3') ?? null,
                    // "pay"=>$request->input('pay'),
                    // "number"=>$request->input('number'),
                    "view" => $request->input('view') ?? 0,
                    "active" => $request->input('active'),
                    "category_id" => $category_id[0],
                    "supplier_id" => $request->input('supplier_id') ?? 0,
                    "admin_id" => auth()->guard('admin')->id()
                ];
                if ($request->has('updated_at') && $request->input('updated_at')) {
                    $dataProductCreate['updated_at'] = $request->created_at;
                }
                if ($request->input('deleted_at') > $request->input('updated_at')) {
                    if ($request->has('deleted_at') && $request->input('deleted_at')) {
                        $dataProductCreate['deleted_at'] = $request->deleted_at;
                    }
                } else {
                    $dataProductCreate['deleted_at'] = $request->updated_at;
                }
                //    dd($dataProductCreate);
                $dataUploadAvatar = $this->storageTraitUploadMask($request, "avatar_path", "product");
                if (!empty($dataUploadAvatar)) {
                    $dataProductCreate["avatar_path"] = $dataUploadAvatar["file_path"];
                } else {
                    $oldProduct = $this->product->find($id);
                    $file_coppy = asset($oldProduct->avatar_path);
                    $newPath = 'upload/images/' . time() . 'jpg';

                    copy($file_coppy, $newPath);
                    $dataProductCreate["avatar_path"] = $newPath;
                }

                $dataUploadAvatar = $this->storageTraitUpload($request, "file", "file");
                if (!empty($dataUploadAvatar)) {
                    $dataProductCreate["file"] = $dataUploadAvatar["file_path"];
                }
                $dataUploadAvatar = $this->storageTraitUpload($request, "file2", "file");
                if (!empty($dataUploadAvatar)) {
                    $dataProductCreate["file2"] = $dataUploadAvatar["file_path"];
                }
                // $dataUploadAvatar = $this->storageTraitUpload($request, "file3", "file");
                // if (!empty($dataUploadAvatar)) {
                //     $dataProductCreate["file3"] = $dataUploadAvatar["file_path"];
                // }

                // insert database in product table
                $product = $this->product->create($dataProductCreate);


                // insert database in product_for_categorys table
                if ($request->has("category")) {
                    $category_ids = [];
                    //dd($category_ids);
                    foreach ($request->input('category') as $categoryItem) {
                        if ($categoryItem) {
                            $categoryInstance = $this->categoryProduct->find($categoryItem);
                            $category_ids[] = $categoryInstance->id;
                        }
                    }
                    //dd($category_ids);

                    $product_cate = $product->productscate()->attach($category_ids);
                }
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
                    $productImage =   $product->images()->createMany($dataProductImageCreate);
                }

                // insert data product lang
                $dataProductTranslation = [];

                foreach ($this->langConfig as $key => $value) {
                    $nameLast = '';


                    // $nameLast=$supplier->name." ". $request->input('masp');
                    // if($request->input('thong_so_phu_'.$key)){
                    //     $nameLast.=" (".$request->input('thong_so_phu_'.$key).")";
                    // }
                    $itemProductTranslation = [];

                    $itemProductTranslation['name_sup'] = $request->input('name_sup_' . $key);
                    $name = $itemProductTranslation['name_sup'] . " " . $nameLast;
                    $itemProductTranslation['name'] = $request->input('name_' . $key);;

                    // $slug = Str::slug($name);
                    // if (Rule::unique("App\Models\ProductTranslation", $slug)) {
                    //     $slug = $slug;
                    // }

                    $itemProductTranslation['slug'] = $request->input('slug_' . $key);
                    // $itemProductTranslation['name_in'] = Str::replace('-', '', $slug);
                    $itemProductTranslation['description'] = $request->input('description_' . $key);
                    $itemProductTranslation['thong_so_phu'] = $request->input('thong_so_phu_' . $key);
                    $itemProductTranslation['description_seo'] = $request->input('description_seo_' . $key);
                    $itemProductTranslation['title_seo'] = $request->input('title_seo_' . $key);
                    $itemProductTranslation['keyword_seo'] = $request->input('keyword_seo_' . $key);
                    $itemProductTranslation['content'] = $request->input('content_' . $key);
                    //add
                    $itemProductTranslation['content2'] = $request->input('content2_' . $key);
                    $itemProductTranslation['content3'] = $request->input('content3_' . $key);
                    $itemProductTranslation['content4'] = $request->input('content4_' . $key);
                    // $itemProductTranslation['model'] = $request->input('model_' . $key);
                    // $itemProductTranslation['tinhtrang'] = $request->input('tinhtrang_' . $key);
                    // $itemProductTranslation['baohanh'] = $request->input('baohanh_' . $key);
                    $itemProductTranslation['xuat_xu'] = $request->input('xuat_xu_' . $key);
                    $itemProductTranslation['unit'] = $request->input('unit_' . $key);

                    $itemProductTranslation['language'] = $key;
                    $dataProductTranslation[] = $itemProductTranslation;
                }
                //Thêm slug vào bảng key
                foreach ($this->langConfig as $key => $value) {
                    $itemKey = [];
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 4;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $product->id;
                    $dataKey = Key::create($itemKey);
                }


                //    dd($dataProductTranslation);
                $productTranslation =   $product->translations()->createMany($dataProductTranslation);
                //  dd($productTranslation);
                // insert database to product_images table


                // insert attribute to product
                if ($request->has("attribute")) {
                    $attribute_ids = [];
                    foreach ($request->input('attribute') as $attributeItem) {
                        if ($attributeItem) {
                            $attributeInstance = $this->attribute->find($attributeItem);
                            $attribute_ids[] = $attributeInstance->id;
                        }
                    }
                    $attribute = $product->attributes()->attach($attribute_ids);
                }

                // insert ProParentChild to product
                if ($request->has("product_parent")) {
                    $pro_parent_child_ids = [];
                    foreach ($request->input('product_parent') as $pro_parent_childItem) {
                        if ($pro_parent_childItem) {
                            $pro_parent_childInstance = $this->product->find($pro_parent_childItem);
                            $pro_parent_child_ids[] = $pro_parent_childInstance->id;
                        }
                    }
                    //dd($product->proChilds()->attach($pro_parent_child_ids));
                    $pro_parent_child = $product->proChilds()->attach($pro_parent_child_ids);
                }

                // insert database to product_tags table
                foreach ($this->langConfig as $key => $value) {
                    if ($request->has("tags_" . $key)) {
                        $tag_ids = [];
                        foreach ($request->input('tags_' . $key) as $tagItem) {
                            $tagInstance = $this->tag->firstOrCreate(["name" => $tagItem]);
                            $tag_ids[] = $tagInstance->id;
                        }
                        $product->tags()->attach($tag_ids, ['language' => $key]);
                    }
                }

                if ($request->has("priceOption")) {
                    //
                    $dataProductOptionCreate = [];
                    foreach ($request->input('priceOption') as $key => $value) {
                        if ($value || $request->input('sizeOption')[$key]) {
                            $dataProductOptionCreate[] = [
                                "price" => $request->input('priceOption')[$key],
                                "size" =>  $request->input('sizeOption')[$key],
                            ];
                        }
                    }
                    //   dd($dataProductAnswerCreate);
                    // insert database in product_images table by createMany
                    $product->options()->createMany($dataProductOptionCreate);
                }


                $danhmuc_ids = [];

                if ($request->has("danhmuc")) {
                    foreach ($request->input('danhmuc') as $danhmucItem) {
                        if ($danhmucItem) {
                            $danhmucInstance = $this->categoryProduct->find($danhmucItem);
                            array_push($danhmuc_ids, $danhmucInstance->id);
                        }
                    }
                }

                if (count($danhmuc_ids) > 0) {
                    $danhmuc = $product->productForCategory()->attach($danhmuc_ids);
                }


                DB::commit();
                return redirect()->route('admin.product.show', ['id' => $product->id])->with("alert", "Thêm sản phẩm thành công");
            } catch (\Exception $exception) {
                //            dd($exception);
                DB::rollBack();
                Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
                return redirect()->route('admin.product.show')->with("error", "Thêm sản phẩm không thành công");
            }
        }
    }
    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;

        Product::whereIn('id', explode(",", $ids))->delete();

        return response()->json(['status' => true, 'message' => "Xóa thành công"]);
    }

    public function uploadFileImage(Request $request)
    {
        if ($request->hasFile("image")) {
            foreach ($request->file('image') as $fileItem) {
                $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
                $dataProductImageCreate[] = [
                    "name" => $dataProductImageDetail["file_name"],
                    "image_path" => $dataProductImageDetail["file_path"]
                ];
            }
        }

        return response()->json([
            "code" => 200,
            "data" => $dataProductImageCreate,
        ], 200);
    }


    public function uploadFileNew(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $arrPath = [];
        $nameFile = [];
        $dataProductImageCreate = [];
        for ($i = 0; $i < $request->total; $i++) {
            $fullPath = '';
            if (!$request->hasFile('image' . $i)) {
                return response()->json(['status' => 400]);;
            }

            $file = $request->file('image' . $i);
            // $saveName = $file->hashName();
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNamNotExtension = pathinfo($fileNameOrigin, PATHINFO_FILENAME);

            $saveName = $fileNamNotExtension . '.webp';

            $fullPath = 'product/' . $id . '/' . $saveName;
            if (!Storage::disk('public')->exists('product/' . $id)) {
                Storage::disk('public')->makeDirectory('product/' . $id);
            }

            $image = Image::make($file);

            $image->save(storage_path('app/public/' . $fullPath), 90, 'webp');

            $arrPath[] = $fullPath;
            $nameFile[] = $saveName;
            // $dataProductImageCreate[] = [
            //     "name" => $nameFile[$i],
            //     "image_path" => $arrPath[$i]
            // ];
        }
        // $product = $this->product->find($id);

        // $productImage =   $product->images()->createMany($dataProductImageCreate);

        return response()->json([
            'arrPath' => $arrPath,
            'nameFile' => $nameFile
        ]);
    }

    public function handleDeleteFile($name, $request)
    {
        $fileDelete = $request->get($name);
        if (Storage::disk()->exists($fileDelete)) {
            Storage::disk()->delete($fileDelete);
        }
        return $fileDelete;
    }
}
