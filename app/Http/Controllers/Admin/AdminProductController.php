<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProParentChild;
use App\Models\Key;
use App\Models\CategoryProduct;
use App\Models\CategoryProductTranslation;
use App\Models\ProductImage;
use App\Models\ProductImage2;
use App\Models\Tag;
use App\Models\CategoryProductAttribute;

use App\Models\ProductStar;
use App\Models\ProductTag;
use App\Models\ProductTab;
use App\Models\ProductTranslation;
use App\Models\Attribute;
use App\Models\Supplier;
use App\Models\SupplierTranslation;
use App\Models\Option;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;
use App\Http\Requests\Admin\ValidateAddProduct;
use App\Http\Requests\Admin\ValidateEditProduct;
use App\Http\Requests\Admin\ValidateUpdateCopyProduct;

use App\Exports\ExcelExportsDatabase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImportsDatabase;
use App\Models\ProductAttribute;
use App\Models\ProductForCategory;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\URL;

class AdminProductController extends Controller
{
    //
    use StorageImageTrait, DeleteRecordTrait;
    private $product;
    private $productStar;
    private $admin;
    private $categoryProduct;
    private $categoryProductTranslation;
    private $htmlselect;
    private $productImage;
    private $tag;
    private $option;
    private $productTag;
    private $productTab;
    private $productTranslation;
    private $supplier;
    private $supplierTranslation;
    private $attribute;
    private $langConfig;
    private $langDefault;

    public function __construct(

        ProductTranslation $productTranslation,
        Product $product,
        ProductStar $productStar,
        Admin $admin,
        CategoryProductTranslation $categoryProductTranslation,
        CategoryProduct $categoryProduct,
        ProductImage $productImage,
        Tag $tag,
        ProductTag $productTag,
        ProductTab $productTab,
        Attribute $attribute,
        Supplier $supplier,
        SupplierTranslation $supplierTranslation,
        Option $option
    ) {
        $this->product = $product;
        $this->productStar = $productStar;
        $this->categoryProduct = $categoryProduct;
        $this->categoryProductTranslation = $categoryProductTranslation;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
        $this->productTab = $productTab;
        $this->productTranslation = $productTranslation;
        $this->attribute = $attribute;
        $this->supplier = $supplier;
        $this->admin = $admin;
        $this->supplierTranslation = $supplierTranslation;
        $this->option = $option;
        $this->langConfig = config('languages.supported');
        $this->langDefault = config('languages.default');
    }
    //
    public function index(Request $request)
    {
        //   dd(App::getLocale());
        $idCategorySearch = [];
        $totalProduct = $this->product->all()->count();
        $data = $this->product;
        if ($request->input('category')) {
            $categoryProductId = $request->input('category');
            $idCategorySearch = $this->categoryProduct->getALlCategoryChildren($categoryProductId);

            $idCategorySearch[] = (int)($categoryProductId);
            $data = $data->whereIn('category_id', $idCategorySearch);
            // dd($idCategorySearch);

            $htmlselect = $this->categoryProduct->getHtmlOption($categoryProductId);
        } else {
            $htmlselect = $this->categoryProduct->getHtmlOption();
        }
        $where = [];
        $orWhere = null;
        if ($request->input('keyword')) {
            // dump($request->input('keyword'));
            $idSupplier = $this->supplierTranslation->where([
                ['name', 'like', '%' . request()->input('keyword') . '%']
            ])->pluck('supplier_id')->unique();

            $idPro = $this->productTranslation->where([
                ['name', 'like', '%' . request()->input('keyword') . '%']
            ])->pluck('product_id')->unique();

            $idAdmin = $this->admin->where([
                ['name', 'like', '%' . request()->input('keyword') . '%']
            ])->pluck('id')->unique();

            $data = $data->where([
                ['masp', 'like', '%' . request()->input('keyword') . '%']
            ])->orWhereIn('id', $idPro)->orWhereIn('supplier_id', $idSupplier)->orWhereIn('admin_id', $idAdmin);

            /*$data = $data->where(function ($query) {
                $idProTran = $this->productTranslation->where([
                    ['masp', 'like', '%' . request()->input('keyword') . '%']
                ])->pluck('product_id');
                
                $query->whereIn('id', $idProTran)->orWhere([
                    ['masp', 'like', '%' . request()->input('keyword') . '%']
                ]);
            });*/
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
                case 'sale':
                    $where[] = ['sale', '=', 1];
                    break;
                case 'no_sale':
                    $where[] = ['sale', '=', 0];
                    break;
                default:
                    break;
            }
        }
        if ($where) {
            $data = $data->where($where);
        }

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
            $data = $data->orderBy("order")->orderBy("created_at", "DESC");
        }
        //  dd($this->product->select('*', \App\Models\Store::raw('Sum(quantity) as total')->whereRaw('products.id','stores.product_id'))->orderBy('total')->paginate(15));
        // dd($data->get());
        $data = $data->paginate(30);

        // dd($data);

        return view(
            "admin.pages.product.list",
            [

                'idCategorySearch' => $idCategorySearch,
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
        $product = $this->product->find($id);
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

    public function autocomplete_ajax_category(Request $request)
    {

        if ($request->ajax()) {
            if ($request->keyword) {

                $keyword = $request->keyword;

                $category = $this->categoryProductTranslation::where(function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', '%' . $keyword . '%');
                })->get();

                $output = '<ul class="dropdown-menu" style="display:block; position: relative;">';
                foreach ($category as $key => $val) {
                    $output .= '
                    <li class="li_search_ajax_cate" data-id="' . $val->category_id . '" data-url="' . route('admin.select.ajax.category', ['id' => $val->category_id]) . '"><a href="#">' . $val->name . '</a></li>

                    ';
                }

                $output .= '</ul>';
                echo $output;
            }
        }
    }


    public function select_ajax_category($id)
    {
        $category = $this->categoryProduct::findOrFail($id);
        if ($category) {
            $output['id'] = $category->id;
            $output['name'] = $category->name;

            echo json_encode($output);
        }
    }

    public function callAjaxAttributes(Request $request)
    {
        $data = [];
        $pushArray = [];
        $variants = [];
        if ($request['type'] == 0) {
            for ($i = 0; $i < 2; $i++) {
                $attributeChild = $this->attribute->where('parent_id', '=', '19')
                    ->join('attribute_translations', 'attribute_id', '=', 'attributes.id')
                    ->select(['attribute_translations.name', 'attribute_translations.id'])
                    ->get();
                $data['attributeChild' . $i] = $attributeChild;
                array_push($data, $data['attributeChild' . $i]);
            }

            foreach ($data['attributeChild0'] as $key => $attributeChild0) {
                foreach ($data['attributeChild1'] as $key1 => $attributeChild1) {
                    if ($attributeChild0 <= $attributeChild1) {
                        array_push($variants, [$attributeChild0, $attributeChild1]);
                    }
                }
            }
            $data['variants'] = $variants;
            return response()->json([
                'code' => 200,
                'html' => view('admin.components.products.variant', $data)->render(),
                'messange' => 'success',
            ], 200);
        }
    }

    public function create(Request $request = null)
    {
        $htmlselect = $this->categoryProduct->getHtmlOption();
        $list_danhmuc = $this->categoryProduct->with('translationsLanguage')->select('category_products.id as id', 'category_product_translations.name as name')
            ->join('category_product_translations', 'category_product_translations.category_id', '=', 'category_products.id')
            ->where('category_products.active', 1)
            ->where('category_products.id', '<>', 2)
            ->orderBy('category_product_translations.name')->get();

        $listId_catePC_Gaming = $this->categoryProduct->getALlCategoryChildren(718);
        $listId_catePC_game = $this->categoryProduct->getALlCategoryChildren(1046);
        $listId_catePC_Office = $this->categoryProduct->getALlCategoryChildren(1047);
        $listId_parent = [718, 1046, 1047];
        //dd($listId_parent);
        $listId_PC = array_merge($listId_catePC_Gaming, $listId_catePC_game, $listId_catePC_Office, $listId_parent);
        //dd($listId_PC);
        $data = $this->product
            ->whereIn('category_id', $listId_PC)
            ->where('active', 1)
            ->orderBy('order')->get();
        //dd($listId_PC);

        $listParrentAttribute = $this->attribute->where('parent_id', '=', 0)->join('attribute_translations', 'attribute_id', '=', 'attributes.id')
            ->select(['attribute_translations.name', 'attribute_translations.id'])
            ->get();

        $data_cate = $this->categoryProduct->with('translationsLanguage')->where('parent_id', 0)->orderBy("order")->get();
        $attributes_baohanh = $this->attribute->where('id', 1419)->get();
        $attributes = $this->attribute->where([
            ['parent_id', 0],
            ['active', 1]
        ])->where('id', '!=', 157)->get();

        $supplier = $this->supplier->all();
        $url = URL::to('/');
        return view(
            "admin.pages.product.add",
            [
                'data' => $data,
                'url' => $url,
                'data_cate' => $data_cate,
                'option' => $htmlselect,
                'attributes' => $attributes,
                'attributes_baohanh' => $attributes_baohanh,
                'list_danhmuc' => $list_danhmuc,
                'supplier' => $supplier,
                'request' => $request,
                'listParrentAttribute' => $listParrentAttribute
            ]
        );
    }

    public function store(ValidateAddProduct $request)
    {
        // dd($request->all());
        // $supplier=$this->supplier->findOrFail($request->input('supplier_id'));
        try {
            DB::beginTransaction();
            $category_id = [];
            $category_id = $request->input('category');
            $dataProductCreate = [
                "masp" => $request->input('masp'),
                "price" => $request->input('price') ?? 0,
                "old_price" => $request->input('old_price') ?? 0,
                "size" => $request->input('size') ?? null,
                "color" => $request->input('color') ?? null,
                "sale" => $request->input('sale') ?? 0,
                "hot" => $request->input('hot') ?? 0,
                "sp_ngoc" => $request->input('sp_ngoc') ?? 0,
                "order" => $request->input('order') ?? null,
                "file3" => $request->input('file3') ?? null,
                "pay" => $request->input('pay'),
                // "number"=>$request->input('number'),
                "warranty" => $request->input('warranty') ?? 0,
                "view" => $request->input('view') ?? 0,
                "active" => $request->input('active'),
                "category_id" => $category_id[0] ?? 0,
                "supplier_id" => $request->input('supplier_id') ?? 0,
                "admin_id" => auth()->guard('admin')->id()
            ];

            // dd($dataProductCreate);

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
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "product");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            $dataUploadAvatar2 = $this->storageTraitUpload($request, "avatar_path2", "product");
            if (!empty($dataUploadAvatar2)) {
                $dataProductCreate["avatar_path2"] = $dataUploadAvatar2["file_path"];
            }

            $dataUploadAvatar3 = $this->storageTraitUpload($request, "avatar_path3", "product");
            if (!empty($dataUploadAvatar3)) {
                $dataProductCreate["avatar_path3"] = $dataUploadAvatar3["file_path"];
            }

            $dataUploadAvatar = $this->storageTraitUpload($request, "file", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["file"] = $dataUploadAvatar["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "file2", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["file2"] = $dataUploadAvatar["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "file3", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["file3"] = $dataUploadAvatar["file_path"];
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
            // insert data product lang
            $dataProductTranslation = [];

            foreach ($this->langConfig as $key => $value) {
                $itemProductTranslation = [];
                $itemProductTranslation['name'] = $request->input('name_' . $key);
                $itemProductTranslation['slug'] = $request->input('slug_' . $key);
                $itemProductTranslation['name1'] = $request->input('name1_' . $key);
                //                $itemProductTranslation['price'] = $request->input('price_' . $key);
                //                $itemProductTranslation['old_price'] = $request->input('old_price_' . $key);
                $itemProductTranslation['title'] = $request->input('title_' . $key);

                $itemProductTranslation['description'] = $request->input('description_' . $key);
                $itemProductTranslation['description2'] = $request->input('description2_' . $key);
                $itemProductTranslation['description3'] = $request->input('description3_' . $key);
                $itemProductTranslation['description4'] = $request->input('description4_' . $key);
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
                $itemProductTranslation['phukien'] = $request->input('phukien_' . $key);
                $itemProductTranslation['tainguyen'] = $request->input('tainguyen_' . $key);
                $itemProductTranslation['hotro'] = $request->input('hotro_' . $key);
                $itemProductTranslation['baohanh'] = $request->input('baohanh_' . $key);
                $itemProductTranslation['xuatsu'] = $request->input('xuatsu_' . $key);

                $itemProductTranslation['language'] = $key;
                $dataProductTranslation[] = $itemProductTranslation;
            }
            // dd($dataProductTranslation);
            //Thêm slug vào bảng key
            // foreach ($this->langConfig as $key => $value) {
            //     $slug = $request->input('slug_' . $key);

            //     $checkKey = Key::where('slug', $slug)->first();


            //     if ($checkKey) {
            //         return redirect()->route('admin.product.index', ['id' => $product->id])->with("error", "Thêm sản phẩm không thành công (Trùng slug)");
            //     }
            //     $itemKey = [];
            //     $itemKey['slug'] = $request->input('slug_' . $key);
            //     $itemKey['type'] = 4;
            //     $itemKey['language'] = $key;
            //     $itemKey['key_id'] = $product->id;
            //     $dataKey = Key::create($itemKey);
            // }
            // $createdSlugs = [];




            //    dd($dataProductTranslation);
            $productTranslation =   $product->translations()->createMany($dataProductTranslation);

            foreach ($this->langConfig as $key => $value) {
                $itemKey = [];
                $itemKey['slug'] = $request->input('slug_' . $key);
                $itemKey['type'] = 4;
                $itemKey['language'] = $key;
                $itemKey['key_id'] = $product->id;
                $dataKey = Key::create($itemKey);
            }
            //  dd($productTranslation);
            // insert database to product_images table
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
            if ($request->hasFile("image2")) {
                //
                $dataProductImageCreate = [];
                foreach ($request->file('image2') as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
                    $dataProductImageCreate[] = [
                        "name" => $dataProductImageDetail["file_name"],
                        "image_path" => $dataProductImageDetail["file_path"]
                    ];
                }
                // insert database in product_images table by createMany
                $productImage =   $product->images2()->createMany($dataProductImageCreate);
            }

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

            if ($request->has("product_post")) {
                $post_ids = $request->input('product_post');

                $data = [];
                foreach ($post_ids as $postItem) {
                    $data[] = [
                        'id_post' => $postItem,
                        'id_product' => $product->id,
                    ];
                }
                DB::table('product_post')->insert($data);
            }

            if ($request->has("product_product")) {
                $product_product_id = $request->input('product_product');

                $data = [];
                foreach ($product_product_id as $item) {
                    $data[] = [
                        'compound_product_id' => $item,
                        'main_product_id' => $product->id,
                    ];
                }
                DB::table('product_and_product')->insert($data);
            }



            if ($request->has("priceOption")) {
                //
                $dataProductOptionCreate = [];
                foreach ($request->input('priceOption') as $key => $value) {
                    if ($value || $request->input('sizeOption')[$key]) {
                        $dataProductOptionCreate[] = [
                            "price" => $request->input('priceOption')[$key],
                            // "old_price" =>  $request->input('old_priceOption')[$key],
                            "size" =>  $request->input('sizeOption')[$key],
                            // "color" =>  $request->input('colorOption')[$key],
                            // "volume" =>  $request->input('volumeOption')[$key],
                            "avatar_type" => null,
                        ];
                        if ($request->input('deleteavatar_type')) {
                            $path = $product->options()->find($key)->avatar_type;

                            if ($path) {
                                $dataProductOptionCreate["avatar_type"] = null;
                            }
                        }
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
            return redirect()->route('admin.product.index', ['id' => $product->id])->with("alert", "Thêm sản phẩm thành công");
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.index')->with("error", "Thêm sản phẩm không thành công");
        }
    }

    public function getSlugAttribute($id)
    {
        $data = DB::table('attributes')->join('attribute_translations', 'attribute_translations.attribute_id', 'attributes.id')->select('attribute_translations.slug')->where('attributes.id', '=', $id)->first();
        return $data;
    }


    public function edit($id)
    {
        $data = $this->product->find($id);
        //$listIdAttr = $this->attribute->where('active',1)->where('parent_id', 0)->where('category_id', $data->category_id)->pluck('id');

        $list_danhmuc = $this->categoryProduct->with('translationsLanguage')->select('category_products.id as id', 'category_product_translations.name as name')
            ->join('category_product_translations', 'category_product_translations.category_id', '=', 'category_products.id')
            ->where('category_products.active', 1)
            ->where('category_products.id', '<>', 2)
            ->orderBy('category_product_translations.name')->get();

        $listId_catePC_Gaming = $this->categoryProduct->getALlCategoryChildren(718);
        $listId_catePC_game = $this->categoryProduct->getALlCategoryChildren(1046);
        $listId_catePC_Office = $this->categoryProduct->getALlCategoryChildren(1047);
        $listId_parent = [718, 1046, 1047];
        $listId_PC = array_merge($listId_catePC_Gaming, $listId_catePC_game, $listId_catePC_Office, $listId_parent);
        $data_ed = $this->product
            ->whereIn('category_id', $listId_PC)
            ->where('active', 1)
            ->orderBy('order')->get();

        //$categoryParentOfAdmin = ProParentChild::where('product_child', $data->id)->get()->pluck('product_parent');

        $data_cate_ed = $this->categoryProduct->with('translationsLanguage')->where('parent_id', 0)->orderBy("order")->get();
        $categoryProductOfAdmin = ProductForCategory::where('product_id', $data->id)->get()->pluck('category_id');
        //$attributes_baohanh = $this->attribute->where('id', 1419)->get();
        $attributes = $this->attribute->where('parent_id', 0)->get();
        $categoryAttrOfAdmin = ProductAttribute::where('product_id', $data->id)->get()->pluck('attribute_id');
        //dd($categoryAttrOfAdmin);
        $category_id = $data->category_id;
        $htmlselect = $this->categoryProduct->getHtmlOption($category_id);
        $supplier = $this->supplier->all();
        // dd($attributes);
        $url = URL::to('/');
        return view("admin.pages.product.edit", [
            'option' => $htmlselect,
            'data' => $data,
            'url' => $url,
            'data_cate_ed' => $data_cate_ed,
            'categoryProductOfAdmin' => $categoryProductOfAdmin,
            'data_ed' => $data_ed,
            //'attributes_baohanh' =>$attributes_baohanh,
            //'categoryParentOfAdmin' => $categoryParentOfAdmin,
            'list_danhmuc' => $list_danhmuc,
            'attributes' => $attributes,
            'supplier' => $supplier,
            'categoryAttrOfAdmin' => $categoryAttrOfAdmin,
        ]);
    }
    public function update(ValidateEditProduct $request, $id)
    {
        // dd($request->all());
        // $supplier=$this->supplier->findOrFail($request->input('supplier_id'));
        try {
            DB::beginTransaction();
            $category_id = [];
            $category_id = $request->input('category');
            //dd($category_id);
            $dataProductUpdate = [
                "masp" => $request->input('masp') ?? null,
                "price" => $request->input('price') ?? 0,
                "old_price" => $request->input('old_price') ?? 0,
                "size" => $request->input('size') ?? null,
                "color" => $request->input('color') ?? null,
                "sale" => $request->input('sale') ?? 0,
                "hot" => $request->input('hot') ?? 0,
                "sp_ngoc" => $request->input('sp_ngoc') ?? 0,
                "order" => $request->input('order') ?? null,
                "file3" => $request->input('file3') ?? null,
                "pay" => $request->input('pay'),
                // "number"=>$request->input('number'),
                "warranty" => $request->input('warranty') ?? 0,
                "view" => $request->input('view') ?? 0,
                "active" => $request->input('active'),
                "category_id" => $category_id[0] ?? 0,
                "supplier_id" => $request->input('supplier_id') ?? 0,
                "admin_id" => auth()->guard('admin')->id()
            ];

            if ($request->has('updated_at') && $request->input('updated_at')) {
                $dataProductUpdate['updated_at'] = $request->created_at;
            }
            if ($request->input('deleted_at') > $request->input('updated_at')) {
                if ($request->has('deleted_at') && $request->input('deleted_at')) {
                    $dataProductUpdate['deleted_at'] = $request->deleted_at;
                }
            } else {
                $dataProductUpdate['deleted_at'] = $request->updated_at;
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "product");
            if (!empty($dataUploadAvatar)) {
                $dataProductUpdate["avatar_path"] = $dataUploadAvatar["file_path"];
            }
            $dataUploadAvatar2 = $this->storageTraitUpload($request, "avatar_path2", "product");
            if (!empty($dataUploadAvatar2)) {
                $dataProductUpdate["avatar_path2"] = $dataUploadAvatar2["file_path"];
            }

            $dataUploadAvatar3 = $this->storageTraitUpload($request, "avatar_path3", "product");
            if (!empty($dataUploadAvatar3)) {
                $dataProductUpdate["avatar_path3"] = $dataUploadAvatar3["file_path"];
            }

            $dataUploadAvatar = $this->storageTraitUpload($request, "file", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductUpdate["file"] = $dataUploadAvatar["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "file2", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductUpdate["file2"] = $dataUploadAvatar["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "file3", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductUpdate["file3"] = $dataUploadAvatar["file_path"];
            }
            if ($request->input('deleteavatar')) {
                $path = $this->product->find($id)->avatar_path;

                if ($path) {
                    $dataProductUpdate["avatar_path"] = null;
                }
            }

            // $dataUploadFile3 = $this->storageTraitUpload($request, "file3", "file");
            // if (!empty($dataUploadFile3)) {
            //     $path = $this->product->find($id)->file3;
            //     if ($path) {
            //         Storage::delete($this->makePathDelete($path));
            //     }
            //     $dataProductUpdate["file3"] = $dataUploadFile3["file_path"];
            // }
            //dd($dataProductUpdate);
            // insert database in product table
            //dd($dataProductUpdate);
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
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

                $product_cate = $product->productscate()->sync($category_ids);
            }
            // insert data product lang
            $dataProductTranslationUpdate = [];

            foreach ($this->langConfig as $key => $value) {
                $itemProductTranslationUpdate = [];
                $itemProductTranslationUpdate['name'] = $request->input('name_' . $key);
                $itemProductTranslationUpdate['name1'] = $request->input('name1_' . $key);
                //                $itemProductTranslationUpdate['price'] = $request->input('price_' . $key);
                //                $itemProductTranslationUpdate['old_price'] = $request->input('old_price_' . $key);
                $itemProductTranslationUpdate['title'] = $request->input('title_' . $key);
                $itemProductTranslationUpdate['slug'] = $request->input('slug_' . $key);
                $itemProductTranslationUpdate['description'] = $request->input('description_' . $key);
                $itemProductTranslationUpdate['description2'] = $request->input('description2_' . $key);
                $itemProductTranslationUpdate['description3'] = $request->input('description3_' . $key);
                $itemProductTranslationUpdate['description4'] = $request->input('description4_' . $key);
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
                $itemProductTranslationUpdate['phukien'] = $request->input('phukien_' . $key);
                $itemProductTranslationUpdate['tainguyen'] = $request->input('tainguyen_' . $key);
                $itemProductTranslationUpdate['hotro'] = $request->input('hotro_' . $key);
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


            //Sửa slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                // dd(Key::where('type', 4)->where('key_id', $product->id)->where('language', $key)->first());
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
            //    dd($product->translations);
            //   $productTranslation =   $product->translations()->saveMany($dataProductTranslationUpdate);
            //  $productTranslation =   $product->translations()->createMany($dataProductTranslationUpdate);

            // dd($product->translations);

            // insert attribute to product
            // dd($request->input('attribute'));
            if ($request->has("attribute")) {
                $attribute_ids = [];
                foreach ($request->input('attribute') as $key => $attributeItem) {
                    if ($attributeItem) {
                        $attributeInstance = $this->attribute->find($attributeItem);
                        if ($attributeInstance) {
                            $attribute_ids[] = $attributeInstance->id;
                        }
                    }
                }
                $attribute = $product->attributes()->sync($attribute_ids);
            } else {
                ProductAttribute::where('product_id', $product->id)->delete();
            }

            if ($request->has("product_parent")) {
                $pro_parent_child_ids = [];
                foreach ($request->input('product_parent') as $pro_parent_childItem) {
                    if ($pro_parent_childItem) {
                        $pro_parent_childInstance = $this->product->find($pro_parent_childItem);
                        $pro_parent_child_ids[] = $pro_parent_childInstance->id;
                    }
                }
                //dd($product->proChilds()->attach($pro_parent_child_ids));
                $pro_parent_child = $product->proChilds()->sync($pro_parent_child_ids);
            }

            // insert database to product_images table
            //            if ($request->hasFile("image")) {
            //                //
            //                //   $product->images()->where("product_id", $id)->delete();
            //                $dataProductImageUpdate = [];
            //                foreach ($request->file('image') as $fileItem) {
            //                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
            //                    $itemImage = [
            //                        "name" => $dataProductImageDetail["file_name"],
            //                        "image_path" => $dataProductImageDetail["file_path"]
            //                    ];
            //                    $dataProductImageUpdate[] = $itemImage;
            //                }
            //                // insert database in product_images table by createMany
            //                // dd($dataProductImageUpdate);
            //                $product->images()->createMany($dataProductImageUpdate);
            //                //  dd($product->images);
            //            }

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




            if ($request->has('index2')) {
                ProductImage2::where('product_id', $product->id)->delete();
                $dataProductImageUpdate2 = [];
                $arr2 = $request->input('index2');
                // dd($arr2);
                foreach ($arr2 as $key => $fileItem) {
                    $itemImage = [
                        "name" => $fileItem,
                        "image_path" => $fileItem,
                        "order" => $key
                    ];
                    $dataProductImageUpdate2[] = $itemImage;
                }
                $product->images2()->createMany($dataProductImageUpdate2);
            }
            if ($request->has('file_xx2')) {
                $dataProductImageUpdate2 = [];
                $arr2 = $request->input('file_xx2');
                // dd($arr2);
                foreach ($arr2 as $key => $fileItem) {
                    $itemImage = [
                        "name" => $fileItem,
                        "image_path" => $fileItem,
                        "order" => $key
                    ];
                    $dataProductImageUpdate2[] = $itemImage;
                }
                ProductImage2::where('product_id', $product->id)->delete();
                $product->images2()->createMany($dataProductImageUpdate2);
            }
            if ($request->has('deleted_image_ids2')) {
                $deletedImageIds2 = $request->input('deleted_image_ids2');
                // dd($deletedImageIds2);
                ProductImage2::whereIn('id', $deletedImageIds2)->delete();
            }


            // if ($request->hasFile("image2")) {
            //     //
            //     //   $product->images()->where("product_id", $id)->delete();
            //     $dataProductImageUpdate = [];
            //     foreach ($request->file('image2') as $fileItem) {
            //         $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
            //         $itemImage = [
            //             "name" => $dataProductImageDetail["file_name"],
            //             "image_path" => $dataProductImageDetail["file_path"]
            //         ];
            //         $dataProductImageUpdate[] = $itemImage;
            //     }
            //     // insert database in product_images table by createMany
            //     // dd($dataProductImageUpdate);
            //     $product->images2()->createMany($dataProductImageUpdate);
            //     //  dd($product->images);
            // }
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
                    if ($value || $request->input('sizeOption')[$key]) {
                        $dataProductOptionCreate[] = [
                            "price" => $request->input('priceOption')[$key],
                            // "old_price" =>  $request->input('old_priceOption')[$key],
                            "size" =>  $request->input('sizeOption')[$key],
                            // "color" =>  $request->input('colorOption')[$key],
                            // "volume" =>  $request->input('volumeOption')[$key],
                            "avatar_type" => null,
                        ];
                        if ($request->input('deleteavatar_type')) {
                            $path = $product->options()->find($key)->avatar_type;

                            if ($path) {
                                $dataProductOptionCreate["avatar_type"] = null;
                            }
                        }
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
                                // "old_price" => $request->input('old_priceOptionOld')[$key],
                                "size" =>  $request->input('sizeOptionOld')[$key],
                                // "color" =>  $request->input('colorOption')[$key],
                                // "volume" =>  $request->input('volumeOption')[$key],
                                "avatar_type" =>  null,
                            ];
                            $option->update($dataProductOptionUpdate);
                        }
                    }
                }
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
                $danhmuc = $product->productForCategory()->sync($danhmuc_ids);
            }


            DB::commit();
            return redirect()->route('admin.product.index', ['page' => session('page')])->with("alert", "Sửa sản phẩm thành công");
        } catch (\Exception $exception) {
            dd($exception);
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.index', ['page' => session('page')])->with("error", "Sửa sản phẩm không thành công");
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
                "html" => view('admin.components.load-change-promotional', ['data' => $product, 'type' => 'sản phẩm khuyến mãi'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }


    public function coppy($id)
    {
        $data = $this->product->find($id);
        $data_cate_ed = $this->categoryProduct->with('translationsLanguage')->where('parent_id', 0)->orderBy("order")->get();
        $categoryProductOfAdmin = ProductForCategory::where('product_id', $data->id)->get()->pluck('category_id');
        $category_id = $data->category_id;
        $htmlselect = $this->categoryProduct->getHtmlOption($category_id);
        $supplier = $this->supplier->all();
        $url = URL::to('/');
        $attributes = $this->attribute->where('parent_id', 0)->get();
        return view("admin.pages.product.coppy", [
            'option' => $htmlselect,
            'url' => $url,
            'attributes' => $attributes,
            'data' => $data,
            'data_cate_ed' => $data_cate_ed,
            'categoryProductOfAdmin' => $categoryProductOfAdmin,
            'supplier' => $supplier,
        ]);
    }



    public function updateCoppy(ValidateUpdateCopyProduct $request, $id)
    {
        try {
            DB::beginTransaction();
            $category_id = [];
            $category_id = $request->input('category');
            $dataProductCreate = [
                "masp" => $request->input('masp'),
                "price" => $request->input('price') ?? 0,
                "old_price" => $request->input('old_price') ?? 0,
                "size" => $request->input('size') ?? null,
                "color" => $request->input('color') ?? null,
                "sale" => $request->input('sale') ?? 0,
                "hot" => $request->input('hot') ?? 0,
                "sp_ngoc" => $request->input('sp_ngoc') ?? 0,
                "order" => $request->input('order') ?? null,
                "file3" => $request->input('file3') ?? null,
                "pay" => $request->input('pay'),
                // "number"=>$request->input('number'),
                "warranty" => $request->input('warranty') ?? 0,
                "view" => $request->input('view') ?? 0,
                "active" => $request->input('active'),
                "category_id" => $category_id[0] ?? 0,
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

            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "product");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            } else {
                //                $oldProduct = $this->product->find($id);
                //                $avatar_path = $oldProduct->avatar_path;
                //                $parts = explode("/", $avatar_path);
                //                $lastPart = end($parts);
                //                $pathInfo = pathinfo($lastPart);
                //                $fileExtension = $pathInfo['extension'];
                //                $fileNameOrigin = $oldProduct->slug .".". $fileExtension;
                //
                //                File::copy($avatar_path, public_path('storage/' . $fileNameOrigin));
                //                $filePath = 'storage/' . $fileNameOrigin;
                //                $dataProductCreate["avatar_path"] = $filePath;
                //
                //                $imageUrl = 'https://cus09.largevendor.com/storage/product/2/tra-oolong-pokka.jpg';
                //                $imageContents = file_get_contents($imageUrl);
                //
                //                Storage::disk('public')->putFileAs("product", $imageContents, 'abc.jpg');
                //                $dataProductCreate["avatar_path"] = $filePath;

                //                $imageData =  \Illuminate\Support\Facades\Http::get($imageUrl)->body();
                //
                //                $fileName = 'abcd.jpg';
                //                $filePath = 'public/images/' . $fileName;
                //
                //                file_put_contents(base_path($filePath), $imageData);

                //                Storage::disk('public')->put($filePath, $imageData);
            }

            $dataUploadAvatar2 = $this->storageTraitUpload($request, "avatar_path2", "product");
            if (!empty($dataUploadAvatar2)) {
                $dataProductCreate["avatar_path2"] = $dataUploadAvatar2["file_path"];
            }

            $dataUploadAvatar3 = $this->storageTraitUpload($request, "avatar_path3", "product");
            if (!empty($dataUploadAvatar3)) {
                $dataProductCreate["avatar_path3"] = $dataUploadAvatar3["file_path"];
            }

            $dataUploadAvatar = $this->storageTraitUpload($request, "file", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["file"] = $dataUploadAvatar["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "file2", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["file2"] = $dataUploadAvatar["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "file3", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["file3"] = $dataUploadAvatar["file_path"];
            }
            // $dataUploadAvatar = $this->storageTraitUpload($request, "file3", "file");
            // if (!empty($dataUploadAvatar)) {
            //     $dataProductCreate["file3"] = $dataUploadAvatar["file_path"];
            // }

            // insert database in product table
            $product = $this->product->create($dataProductCreate);

            // dd($product);
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
            // insert data product lang
            $dataProductTranslation = [];

            foreach ($this->langConfig as $key => $value) {
                $itemProductTranslation = [];
                $itemProductTranslation['name'] = $request->input('name_' . $key);
                $itemProductTranslation['name1'] = $request->input('name1_' . $key);
                $itemProductTranslation['price'] = $request->input('price_' . $key);
                $itemProductTranslation['old_price'] = $request->input('old_price_' . $key);
                $itemProductTranslation['title'] = $request->input('title_' . $key);
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


            //    dd($dataProductTranslation);
            $productTranslation =   $product->translations()->createMany($dataProductTranslation);

            foreach ($this->langConfig as $key => $value) {
                $itemKey = [];
                $itemKey['slug'] = $request->input('slug_' . $key);
                $itemKey['type'] = 4;
                $itemKey['language'] = $key;
                $itemKey['key_id'] = $product->id;
                $dataKey = Key::create($itemKey);
            }
            //  dd($productTranslation);
            // insert database to product_images table
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
            if ($request->hasFile("image2")) {
                //
                $dataProductImageCreate = [];
                foreach ($request->file('image2') as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
                    $dataProductImageCreate[] = [
                        "name" => $dataProductImageDetail["file_name"],
                        "image_path" => $dataProductImageDetail["file_path"]
                    ];
                }
                // insert database in product_images table by createMany
                $productImage =   $product->images2()->createMany($dataProductImageCreate);
            }

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

            if ($request->has("priceOption")) {
                $dataProductOptionCreate = [];
                foreach ($request->input('priceOption') as $key => $value) {
                    if ($value || $request->input('sizeOption')[$key]) {
                        $dataProductOptionCreate[] = [
                            "price" => $request->input('priceOption')[$key],
                            "old_price" =>  $request->input('old_priceOption')[$key],
                            "size" =>  $request->input('sizeOption')[$key],
                            "color" =>  $request->input('colorOption')[$key],
                            "volume" =>  $request->input('volumeOption')[$key],
                            "avatar_type" => null,
                        ];
                        if ($request->input('deleteavatar_type')) {
                            $path = $product->options()->find($key)->avatar_type;

                            if ($path) {
                                $dataProductOptionCreate["avatar_type"] = null;
                            }
                        }
                    }
                }
                dd($dataProductAnswerCreate);
                // insert database in product_images table by createMany
                $product->options()->createMany($dataProductOptionCreate);
            }

            DB::commit();
            return redirect()->route('admin.product.index', ['id' => $product->id])->with("alert", "Thêm sản phẩm thành công");
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.index')->with("error", "Thêm sản phẩm không thành công");
        }
    }

    public function editPriceAttr(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id_prod) {
                $id_prod = $request->id_prod;
                $product = $this->product->where('active', 1)->find($id_prod);

                $product_id = $product->id;

                $listIdAttr = $this->attribute->where('active', 1)->where('parent_id', 0)->where('category_id', $product->category_id)->pluck('id');

                $attributes = $this->attribute->where('active', 1)->whereIn('parent_id', $listIdAttr)->get();

                //echo json_encode($output);
                return response()->json([
                    'code' => 200,
                    'html' => view('admin.components.load-change-price-attr-product', [
                        'attributes' => $attributes,
                        'product_id' => $product_id,
                        'data' => $product,
                    ])->render(),
                    'messange' => 'success'
                ], 200);
            }
        }
    }

    public function updatePriceAttr(Request $request, $id)
    {
        if ($id) {
            try {
                DB::beginTransaction();
                $product = $this->product->find($id);

                if ($request->has("attribute")) {
                    $attribute_ids = [];
                    foreach ($request->input('attribute') as $attributeItem) {
                        if ($attributeItem) {
                            $attributeInstance = $this->attribute->find($attributeItem);
                            $attribute_ids[] = $attributeInstance->id;
                        }
                    }
                    $attribute = $product->attributes()->sync($attribute_ids);
                }

                DB::commit();

                return redirect()->route('admin.product.index')->with("msg", "Cập nhật dữ liệu thành công!");
            } catch (\Exception $exception) {
                DB::rollBack();

                Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
                return redirect()->route('admin.product.index')->with("msg", "Cập nhật dữ liệu không thành công");
            }
        }
    }


    public function editPrice(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id_prod) {
                $id_prod = $request->id_prod;
                $product = $this->product->where('active', 1)->find($id_prod);
                $productTranslation = $product->translations()->first();

                $type_price = $product->type_price;

                //$output['product_id'] = $product->id;

                $product_id = $product->id;

                $product_price = $product->price;
                $product_old_price = $product->old_price;

                //echo json_encode($output);
                return response()->json([
                    'code' => 200,
                    'html' => view('admin.components.load-change-price-product', [
                        'type_price' => $type_price,
                        'product_price' => $product_price,
                        'product_old_price' => $product_old_price,
                        'product_id' => $product_id,
                    ])->render(),
                    'messange' => 'success'
                ], 200);
            }
        }
    }

    public function updatePrice(Request $request, $id)
    {
        if ($id) {

            try {
                DB::beginTransaction();
                $dataProductUpdate = [
                    "type_price" => $request->input('type_price'),
                    "price" => $request->input('price') ?? 0,
                    "old_price" => $request->input('old_price') ?? 0,
                ];
                //dd($dataProductUpdate);
                $this->product->find($id)->update($dataProductUpdate);

                DB::commit();

                return redirect()->route('admin.product.index')->with("msg", "Cập nhật dữ liệu thành công!");
            } catch (\Exception $exception) {
                DB::rollBack();

                Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
                return redirect()->route('admin.product.index')->with("msg", "Cập nhật dữ liệu không thành công");
            }
        }
    }


    public function show($id)
    {
        $data = $this->product->findOrFail($id);
        return view("admin.pages.product.show", [
            'data' => $data
        ]);
    }
    public function verify($id)
    {
        $product   =  $this->product->findOrFail($id);
        $is_verify = $product->is_verify;
        if (!$is_verify) {
            $is_verifyUpdate = 1;
            $updateResult =  $product->update([
                'is_verify' => $is_verifyUpdate,
                'admin_verify_id' => auth()->guard('admin')->id()
            ]);
            $product  =  $this->product->find($id);
        }
        return redirect()->route('admin.product.show', ['id' => $product->id])->with("alert", "Xác thực thành công");
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

    public function changeAttr(Request $request)
    {
        if ($request->id) {
            $id = $request->id;

            $listIdAttr = $this->attribute->where('active', 1)->where('parent_id', 0)->where('category_id', $id)->pluck('id');

            $attributes = $this->attribute->where('active', 1)->whereIn('parent_id', $listIdAttr)->get();

            return response()->json([
                'code' => 200,
                'html' => view('admin.components.search.load-attr-product', [
                    'attributes' => $attributes,
                    'type' => '1',
                ])->render(),
                'messange' => 'success'
            ], 200);
        }

        if ($request->category_id) {
            $id = $request->category_id;

            $listIdAttr = $this->attribute->where('active', 1)->where('parent_id', 0)->where('category_id', $id)->pluck('id');

            $attributes = $this->attribute->where('active', 1)->whereIn('parent_id', $listIdAttr)->get();

            $product_id = $request->product_id;

            $data = $this->product->find($product_id);

            return response()->json([
                'code' => 200,
                'html' => view('admin.components.search.load-attr-product', [
                    'attributes' => $attributes,
                    'data' => $data,
                    'type' => '2',
                ])->render(),
                'messange' => 'success'
            ], 200);
        }
    }

    public function reportProductForAdmin(Request $request)
    {
        //   dd(App::getLocale());

        $data = $this->product;
        $now = new Carbon();
        $admin = $this->admin->whereNotIn('id', [2])->get();

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

            $idSupplier = $this->supplierTranslation->where([
                ['name', 'like', '%' . request()->input('keyword') . '%']
            ])->pluck('supplier_id')->unique();

            $idAdmin = $this->admin->where([
                ['name', 'like', '%' . request()->input('keyword') . '%']
            ])->pluck('id')->unique();

            $data = $data->where([
                ['masp', 'like', '%' . request()->input('keyword') . '%']
            ])->orWhereIn('supplier_id', $idSupplier)->orWhereIn('admin_id', $idAdmin);

            /*$data = $data->where(function ($query) {
                $idProTran = $this->productTranslation->where([
                    ['masp', 'like', '%' . request()->input('keyword') . '%']
                ])->pluck('product_id');
                
                $query->whereIn('id', $idProTran)->orWhere([
                    ['masp', 'like', '%' . request()->input('keyword') . '%']
                ]);
            });*/
            // $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
            // $orWhere = ['masp', 'like', '%' . $request->input('keyword') . '%'];
        }

        if ($request->input('start') && $request->input('end')) {
            $start = $request->input('start');
            $end = $request->input('end');
            $data = $data->whereBetween('created_at', [$start, $end]);
        } else if ($request->input('start')) {
            $start = $request->input('start');
            $data = $data->whereBetween('created_at', [$start, $now::now()]);
        }

        if ($request->input('admin_id')) {
            $admin_id = $request->input('admin_id');
            $data = $data->where('admin_id', $admin_id);
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
        $totalProduct = $data->count();
        $data = $data->paginate(30);



        return view(
            "admin.pages.user_frontend.report-list",
            [
                'data' => $data,
                'admin' => $admin,
                'totalProduct' => $totalProduct,
                'option' => $htmlselect,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'start' => $request->input('start') ? $request->input('start') : "",
                'end' => $request->input('end') ? $request->input('end') : $now->toDateString(),
                'admin_id' => $request->input('admin_id') ? $request->input('admin_id') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
            ]
        );
    }

    public function destroy($id)
    {
        Key::where([
            ['key_id', $id],
            ['type', 4]
        ])->delete();

        return $this->deleteTrait($this->product, $id);
    }



    public function destroyProductAvatar($id)
    {
        // dd($id);
        return $this->deleteAvatarTrait($this->product, $id);
    }
    public function destroyProductAvatar2($id)
    {
        return $this->deleteAvatarTrait2($this->product, $id);
    }


    public function destroyProductImage($id)
    {
        return $this->deleteImageTrait($this->productImage, $id);
    }

    public function updatePriceAll(Request $request)
    {

        $ids = $request->ids;
        $type_price = $request->input('type_price');
        $type_unit = $request->input('type_unit');
        $price = $request->input('price');

        $data = $this->product->whereIn('id', $ids)->get();

        if (count($data) > 0) {
            foreach ($data as $item) {
                if ($type_unit == 1) {
                    $newPrice = $price;
                } else {
                    $newPrice = $item->price * ($price / 100);
                }

                if ($type_price == 1) {
                    $newPrice2 = $item->price + $newPrice;
                    $item->update(
                        [
                            'price' => $newPrice2,
                        ]
                    );
                } else {
                    $newPrice2 = $item->price - $newPrice;
                    if ($newPrice2 <= 0) {
                        $item->update(
                            [
                                'price' => 0,
                            ]
                        );
                    } else {
                        $item->update(
                            [
                                'price' => $newPrice2,
                            ]
                        );
                    }
                }
            }
        }

        if ($data) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.pages.product.list'),
                "message" => "Cập nhật thành công!"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "html" => view('admin.pages.product.list'),
                "message" => "Cập nhật thất bại!"
            ], 500);
        }
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
    public function loadOrder($id, $order)
    {
        $data = $this->product->find($id);

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

    public function listProductTab($product_id, Request $request)
    {

        $data = $this->productTab->where('product_id', $product_id)->get();

        return view(
            "admin.pages.product.tab-list",
            [
                'data' => $data,
                'product_id' => $product_id,
            ]
        );
    }

    public function addProductTab($product_id, Request $request = null)
    {
        $htmlselect = $this->categoryProduct->getHtmlOption();
        $supplier = $this->supplier->all();
        return view(
            "admin.pages.product.tab-add",
            [
                'option' => $htmlselect,
                'product_id' => $product_id,
                'request' => $request
            ]
        );
    }


    public function tabStore(Request $request)
    {

        try {
            DB::beginTransaction();
            $dataProductTabCreate = [
                "name" => $request->input('name'),
                "icon" => $request->input('icon'),
                "description" => $request->input('description'),
                "content" => $request->input('content'),
                "product_id" => $request->input('product_id'),
            ];
            //    dd($dataProductCreate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "tab");
            if (!empty($dataUploadAvatar)) {
                $dataProductTabCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            // dd($dataProductCreate);
            // insert database in product table
            $tab = $this->productTab->create($dataProductTabCreate);
            // insert data product lang

            DB::commit();
            return redirect()->route('admin.product.tab', ['product_id' => $request->input('product_id')])->with("alert", "Thêm tab sản phẩm thành công");
        } catch (\Exception $exception) {

            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.tab', ['product_id' => $request->input('product_id')])->with("error", "Thêm tab sản phẩm không thành công");
        }
    }

    public function editProductTab($id)
    {
        $data = $this->productTab->find($id);
        return view("admin.pages.product.tab-edit", [
            'data' => $data,
        ]);
    }

    public function updateProductTab(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductTabUpdate = [
                "name" => $request->input('name'),
                "icon" => $request->input('icon'),
                "description" => $request->input('description'),
                "content" => $request->input('content'),
                "product_id" => $request->input('product_id'),
            ];
            // dd( $dataProductUpdate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "tab");
            if (!empty($dataUploadAvatar)) {
                $path = $this->productTab->find($id)->avatar_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataProductTabUpdate["avatar_path"] = $dataUploadAvatar["file_path"];
            }


            // insert database in product table
            $this->productTab->find($id)->update($dataProductTabUpdate);


            DB::commit();
            return redirect()->route('admin.product.tab', ['product_id' => $request->input('product_id')])->with("alert", "Sửa tab sản phẩm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.tab', ['product_id' => $request->input('product_id')])->with("error", "Sửa tab sản phẩm không thành công");
        }
    }
    public function destroyTab($id)
    {
        return $this->deleteTrait($this->productTab, $id);
    }

    public function updateProductPost(Request $request)
    {
        try {
            DB::beginTransaction();
            $mainProductId = $request->input('mainProductId');
            $compoundProductId = $request->input('compoundProductId');

            $existingRecord = DB::table('product_and_product')
                ->where('main_product_id', '=', $mainProductId)
                ->where('compound_product_id', '=', $compoundProductId)
                ->first();
            if ($existingRecord) {
                // Nếu cặp đã tồn tại, xóa bản ghi
                DB::table('product_and_product')
                    ->where('main_product_id', $mainProductId)
                    ->where('compound_product_id', $compoundProductId)
                    ->delete();
            } elseif ($existingRecord == null) {
                // Nếu cặp chưa tồn tại, thêm mới vào
                DB::table('product_and_product')->insert([
                    'main_product_id' => $mainProductId,
                    'compound_product_id' => $compoundProductId
                ]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :'
                . $exception->getLine());
        }
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

            //Storage::disk('public')->put($fullPath, file_get_contents($file));
            //$arrPath[] = $fullPath;
            // $nameFile[] = $saveName;
            // // $dataProductImageCreate[] = [
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


    public function uploadFileNew2(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $arrPath = [];
        $nameFile = [];
        $dataProductImageCreate = [];
        for ($i = 0; $i < $request->total; $i++) {
            $fullPath = '';
            if (!$request->hasFile('image2' . $i)) {
                return response()->json(['status' => 400]);;
            }

            $file = $request->file('image2' . $i);
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

            //Storage::disk('public')->put($fullPath, file_get_contents($file));
            //$arrPath[] = $fullPath;
            // $nameFile[] = $saveName;
            // // $dataProductImageCreate[] = [
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

    public function deleteAll(Request $request)
    {
        $idProduct = $request->checkedValues;
        $model = $this->product;
        if ($idProduct) {
            try {
                foreach ($idProduct as $id) {
                    $model->find($id)->delete();
                    Key::where('key_id', $id)->delete();
                }
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
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->query('keyword');
        $data = $this->product;
        if ($keyword) {

            $idPro = $this->productTranslation->where([
                ['name', 'like', '%' . $keyword . '%']
            ])->pluck('product_id')->unique();

            $data = $data->orWhereIn('id', $idPro)->get();
        }
        return view('admin.components.search-product', [
            'data' => $data,
        ]);
    }

    public function getAttribute(Request $request)
    {
        try {
            $selectedAttributes = $request->input('selected_attributes', []);

            // if ($request->has('product_id')) {
            //     $product_id = $request->input('product_id');
            //     $selectedAttributes = ProductAttribute::find($product_id)->attributes()->pluck('attribute_id')->toArray();
            // }
            $selectedAttributes = [];
            if ($request->has('product_id')) {
                $product_id = $request->input('product_id');

                // Tìm sản phẩm qua $product_id
                $selectedAttributes = ProductAttribute::where('product_id', $product_id)->pluck('attribute_id')->toArray();
            }
            // dd($request->input('product_id'));
            $requestId = $request->ids;
            $attributes = Attribute::where([
                ['parent_id', 0],
                ['active', 1]
            ])->where('id', '!=', 157)->get();
            $attribute_product = [];
            if (isset($request->id_product)) {
                $product = Product::find($request->id_product);
                $attribute_product = $product->attributes()->pluck('attribute_id')->toArray();
            }
            $attribute_ids = CategoryProductAttribute::whereIn('category_product_id', [$requestId])->pluck('attribute_id')->toArray();
            if (!is_null($requestId)) {
                $attributes = Attribute::whereIn('id', $attribute_ids)->orderBy('order')->get();
                $arr_id = [];
                foreach ($attributes as $attribute) {
                    if ($attribute->parent()->first()) {
                        if (!in_array($attribute->parent()->first()->id, $arr_id)) {
                            $arr_id[] = $attribute->parent()->first()->id;
                        }
                    } else {
                        if (!in_array($attribute->id, $arr_id)) {
                            $arr_id[] = $attribute->id;
                        }
                    }
                }
                $attributes = Attribute::whereIn('id', $arr_id)->orderBy('order')->get();
            }

            if ($attributes->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không có thuộc tính nào phù hợp.'
                ]);
            }

            $html = view('admin.pages.product.load-attribute', compact('attributes', 'selectedAttributes', 'attribute_product', 'attribute_ids', 'requestId'))->render();

            return response()->json([
                'success' => true,
                'html' => $html
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
