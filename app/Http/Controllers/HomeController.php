<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Post;
use App\Models\Galaxy;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Setting;
use App\Models\PostCate;
use App\Models\Attribute;
use Jenssegers\Agent\Agent;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Models\CategoryGalaxy;
use Illuminate\Support\Carbon;
use App\Models\CategoryLanding;
use App\Models\CategoryProduct;
use App\Models\PostTranslation;
use App\Models\ProductAttribute;
use App\Models\ProductForCategory;
use App\Models\ProductTranslation;
use App\Models\CategoryProductAttribute;
use App\Models\CategoryPostTranslation;
use App\Models\Supplier;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $product;
    private $setting;
    private $slider;
    private $attribute;
    private $post;
    private $productForCategory;
    private $categoryProductAttribute;
    private $productAttribute;
    private $categoryPost;
    private $supplier;
    private $categoryProduct;
    private $postTranslation;
    private $categoryPostTranslation;
    private $productTranslation;
    private $productSearchLimit  = 12;
    private $unit                = 'đ';

    public function __construct(
        CategoryProductAttribute $categoryProductAttribute,
        Product $product,
        Setting $setting,
        Slider $slider,
        Supplier $supplier,
        Post $post,
        Attribute $attribute,
        CategoryPost $categoryPost,
        CategoryProduct $categoryProduct,
        PostTranslation $postTranslation,
        CategoryPostTranslation $categoryPostTranslation,
        ProductTranslation $productTranslation,
        ProductForCategory $productForCategory,
        ProductAttribute $productAttribute
    ) {
        /*$this->middleware('auth');*/
        $this->categoryProductAttribute = $categoryProductAttribute;
        $this->attribute = $attribute;
        $this->product = $product;
        $this->supplier = $supplier;
        $this->setting = $setting;
        $this->slider = $slider;
        $this->post = $post;
        $this->categoryPost = $categoryPost;
        $this->categoryProduct = $categoryProduct;
        $this->postTranslation = $postTranslation;
        $this->categoryPostTranslation = $categoryPostTranslation;
        $this->productTranslation = $productTranslation;
        $this->productForCategory = $productForCategory;
        $this->productAttribute = $productAttribute;
    }

    public function index(Request $request)
    {
        $arr_query = $request->all();
        if (count($arr_query)) {
            $categories_id = $request->input('categories');
            $brands_id = $request->input('brands');

            $category_all = $this->categoryProduct->where('active', 1)->find(276);

            $category_total = $this->categoryProduct->where([['active', 1], ['parent_id', 276]])->get();

            $attributes = $this->attribute->where([['active', 1], ['parent_id', 0]])->where('id', '!=', 157)->orderBy('order', 'asc')->get();
            $attributes_total = $this->attribute->where([['active', 1], ['parent_id', 0], ['hot', 1]])->where('id', '!=', 157)->orderBy('order', 'asc')->get();

            $prices = $this->attribute->where('active', 1)->find(157);
            $categoryProductAttribute_total = $prices->childs()->orderBy('order', 'asc')->pluck('id')->toArray();

            $brands = $this->supplier->where('active', 1)->get();

            if ($brands_id) {
                $brands_arr = explode(',', $brands_id);
                if (count($brands_arr) > 0) {
                    $brands_products_id = $this->product->whereIn('supplier_id', $brands_arr)->pluck('id')->toArray();
                    $categories_arr = $this->productForCategory->whereIn('product_id', $brands_products_id)->pluck('category_id')->toArray();
                    $categoryProductAttribute = $this->categoryProductAttribute->whereIn('category_product_id', $categories_arr)->whereNotIn('attribute_id', [$prices->id, ...$prices->childs()->pluck('id')->toArray()])->pluck('attribute_id')->toArray();
                    $attributes = $this->attribute->whereIn('id', $categoryProductAttribute)->where([['parent_id', 0], ['active', 1], ['hot', 1]])->orderBy('order', 'asc')->get();
                    $attributes_total = $this->attribute->whereIn('id', $categoryProductAttribute)->where([['parent_id', 0], ['active', 1], ['hot', 1]])->orderBy('order', 'asc')->get();

                    $category_total = $this->categoryProduct->whereIn('id', $categories_arr)->where('active', 1)->get();
                }
            }
            if ($categories_id) {
                $categories_arr = explode(',', $categories_id);
                if (count($categories_arr) > 0) {
                    $categoryProductAttribute = $this->categoryProductAttribute->whereIn('category_product_id', $categories_arr)->whereNotIn('attribute_id', [$prices->id, ...$prices->childs()->pluck('id')->toArray()])->pluck('attribute_id')->toArray();
                    $categoryProductAttribute_total = $this->categoryProductAttribute->whereIn('category_product_id', $categories_arr)->pluck('attribute_id')->toArray();
                    $arr = [];
                    foreach ($categoryProductAttribute as $attribute) {
                        if (!in_array($attribute, $arr)) {
                            if (isset($this->attribute->where('active', 1)->find($attribute)->parent)) {
                                $arr[] = $this->attribute->where('active', 1)->find($attribute)->parent()->first()->id;
                            } else {
                                $arr[] = $attribute;
                            }
                        }
                    }



                    // $categoryProductAttribute = $this->categoryProductAttribute->whereIn('category_product_id', $categories_arr)->whereNotIn('attribute_id', [$prices->id, ...$prices->childs()->pluck('id')->toArray()])->pluck('attribute_id')->toArray();
                    $attributes = $this->attribute->whereIn('id', $arr)->where([['parent_id', 0], ['active', 1], ['hot', 1]])->orderBy('order', 'asc')->get();
                    $attributes_total = $this->attribute->whereIn('id', $arr)->where([['parent_id', 0], ['active', 1], ['hot', 1]])->orderBy('order', 'asc')->get();


                    $category_total = false;

                    $categoryProductAttribute_total = $this->categoryProductAttribute->whereIn('category_product_id', $categories_arr)->pluck('attribute_id')->toArray();

                    // $categories = $this->categoryProduct->getALlCategoryChildrenAndSelf($category->id);

                    $arrCategoryId = $categories_arr;

                    foreach ($categories_arr as $category) {
                        foreach ($this->categoryProduct->getALlCategoryChildrenAndSelf($category) as $id_category) {
                            $arrCategoryId[] = $id_category;
                        }
                    }

                    $listIdProduct = ProductForCategory::whereIn('category_id', $arrCategoryId)->pluck('product_id')->toArray();
                    $products = $this->product->where('active', 1)->whereIn('id', $listIdProduct);

                    $product_brands = $products->pluck('supplier_id')->toArray();
                    $brands = $this->supplier->where('active', 1)->whereIn('id', $product_brands)->orderBy('order', 'asc')->get();
                }
            }

            $attributes_sex  = $this->attribute->where([['active', 1], ['parent_id', 127]])->orderBy('order', 'desc')->get();
            $products = $this->filterProduct($request);

            $total_products = $products->count();
            $products = $products->paginate(20);

            return view('frontend.pages.product-by-category', compact('categoryProductAttribute', 'categoryProductAttribute_total', 'category_all', 'brands', 'prices', 'category_total', 'attributes', 'attributes_sex', 'products', 'total_products', 'attributes_total'));
        } else {
            // Slider
            $slide = $this->slider->where('active', 1)->where('type', 1)->orderBy('order')->get();

            // Settings
            $supports = $this->setting->where('active', 1)->find(253);
            $clock_hungtien = $this->setting->where('active', 1)->find(319);
            $promotional_products = $this->setting->where('active', 1)->find(322);
            $clocks_men = $this->setting->where('active', 1)->find(323);
            $clocks_women = $this->setting->where('active', 1)->find(324);
            $clocks_wall = $this->setting->where('active', 1)->find(325);
            $bannerTop = $this->setting->where('active', 1)->find(329);
            $bannersBottom = $this->setting->where('active', 1)->find(328);
            $news_title = $this->setting->where('active', 1)->find(332);

            // Category Product
            $category_products_hot = $this->categoryProduct->where([['active', 1], ['hot', 1]])->orderBy('order')->get();
            $category_clock_wall = $this->categoryProduct->where('active', 1)->find(296);
            $category_clock_men = $this->categoryProduct->where('active', 1)->find(335);
            $category_clock_women = $this->categoryProduct->where('active', 1)->find(336);

            // Category Post
            $category_news = $this->categoryPost->where('active', 1)->find(159);

            // Supplier
            $suppliers = $this->supplier->where('active', 1)->orderBy('order', 'asc')->get();

            // Post
            $posts_hot = $category_news->posts()->where([['active', 1], ['hot', 1]])->orderBy('created_at', 'desc')->limit(4)->get();

            //Product
            $products_promotional = $this->product->where([['active', 1], ['sale', 1]])->limit(8)->get();

            //Attribute
            $attribute_men = $this->attribute->where('active', 1)->find(1732);
            $attribute_women = $this->attribute->where('active', 1)->find(1733);

            $products_men = $attribute_men->products()->where([
                ['active', 1],
                ['hot', 1]
            ])->orderBy('created_at', 'desc')->orderBy('id', 'desc')->limit(4)->get();
            $products_women = $attribute_women->products()->where([
                ['active', 1],
                ['hot', 1]
            ])->orderBy('created_at', 'desc')->orderBy('id', 'desc')->limit(4)->get();
            $product_clock_wall = $category_clock_wall->products()->where([
                ['active', 1],
                ['hot', 1]
            ])->orderBy('created_at', 'desc')->orderBy('id', 'desc')->limit(4)->get();

            return view('frontend.pages.home', compact(
                'slide',
                'clock_hungtien',
                'supports',
                'promotional_products',
                'category_products_hot',
                'products_promotional',
                'category_clock_men',
                'category_clock_women',
                'clocks_men',
                'clocks_women',
                'clocks_wall',
                'bannerTop',
                'bannersBottom',
                'news_title',
                'posts_hot',
                'products_men',
                'products_women',
                'suppliers',
                'product_clock_wall',
                'category_clock_wall',
                'attribute_men',
                'attribute_women'
            ));
        }
    }

    function getTotalProduct(Request $request)
    {
        $total_products = $this->filterProduct($request)->count();

        return response()->json([
            'status' => 200,
            'total' => $total_products
        ]);
    }

    public function filterProduct($request)
    {
        $categories = $request->input('categories');
        $attributes = $request->input('attributes');
        $prices = $request->input('prices');
        $brands = $request->input('brands');
        $sort = $request->input('sort');
        $products = $this->product->where('active', 1);
        $arrId_productCategory = [];
        $arrId_productAttribute = [];
        $listId_productCombine = [];
        $range = [];

        if ($categories) {
            $categories_arr = explode(',', $categories);
            if (count($categories_arr) > 0) {
                $arrId_productCategory = $this->productForCategory->whereIn('category_id', $categories_arr)->pluck('product_id')->toArray();
            }
        }

        if ($attributes) {
            $attributes_arr = explode(',', $attributes);
            if (count($attributes_arr) > 0) {
                $data = [];
                $productAttribute = $this->productAttribute->whereIn('attribute_id', $attributes_arr)->get();
                foreach ($productAttribute as $item) {
                    if (array_key_exists($item->product_id, $data)) {
                        array_push($data[$item->product_id], $item->attribute_id);
                    } else {
                        $data[$item->product_id] = [(string)$item->attribute_id];
                    }
                }
                foreach ($data as $key => $item) {
                    if (count($item) == count($attributes_arr)) {
                        $count = 0;
                        foreach ($item as $id) {
                            if (in_array($id, $attributes_arr)) {
                                ++$count;
                            }
                        }
                        if ($count == count($attributes_arr)) {
                            $arrId_productAttribute[] = $key;
                        }
                    }
                }
            }
        }

        if ($prices) {
            $prices_arr = explode(',', $prices);
            if (count($prices_arr) > 0) {
                $prices_ins = $this->attribute->where([['active', 1], ['parent_id', 157]])->whereIn('id', $prices_arr)->get();
                $products = $products->where(function ($query) use ($prices_ins) {
                    foreach ($prices_ins as $index => $price) {
                        $valueRange =  explode('-', $price->value);
                        if (count($valueRange) > 1) {
                            if ($index === 0) {
                                $query->whereBetween('price', $valueRange);
                            } else {
                                $query->orWhereBetween('price', $valueRange);
                            }
                        } else {
                            if ($index === 0) {
                                $query->where('price', '>', $valueRange[0]);
                            } else {
                                $query->orWhere('price', '>', $valueRange[0]);
                            }
                        }
                    }
                });
                // $flag = 0;
                // foreach ($prices_ins as $item) {
                //     $arr_item = explode('-', $item->value);
                //     if (count($arr_item) > 1) {
                //         foreach ($arr_item as $point) {
                //             $range[] =  $point;
                //         }
                //     } else {
                //         $flag = $flag > 0 && $flag < $arr_item[0] ? $flag : $arr_item[0];
                //     }
                // }
                // if (count($range) > 0) {
                //     $range = [min($range), max($range)];
                //     if ($range[1] < $flag) {
                //         unset($range[1]);
                //     }
                // } else {
                //     $range[] = $flag;
                // }
            }
        }

        if ($brands) {
            $brands_arr = explode(',', $brands);
            if (count($brands_arr) > 0) {
                $products = $products->whereIn('supplier_id', $brands_arr);
            }
        }

        if ($categories && $attributes) {
            $listId_productCombine = array_values((array_intersect($arrId_productCategory, $arrId_productAttribute)));
        } else if (count($arrId_productCategory) > 0) {
            $listId_productCombine = $arrId_productCategory;
        } else if (count($arrId_productAttribute) > 0) {
            $listId_productCombine = $arrId_productAttribute;
        }

        if ($categories || $attributes) {
            $products = $products->whereIn('id', $listId_productCombine);
        }

        // if (count($range)) {
        //     if (count($range) > 1) {
        //         $products = $products->whereBetween('price', [$range[0], $range[1]]);
        //     } else {
        //         $products = $products->where('price', '>', $range[0]);
        //     }
        // }

        if ($sort) {
            switch ($sort) {
                case 'createdAt_desc':
                    $products = $products->orderBy('created_at', 'desc');
                    break;
                case 'createdAt_asc':
                    $products = $products->orderBy('created_at', 'asc');
                    break;
                case 'price_asc':
                    $products = $products->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $products = $products->orderBy('price', 'desc');
                    break;
                default:
                    $products = $products->orderBy('created_at', 'desc');
                    break;
            }
        }

        return $products->orderBy('size','desc')->orderBy('order','desc');
    }

    public function aboutUs(Request $request)
    {
        $resultCheckLang = checkRouteLanguage2();
        if ($resultCheckLang) {
            return $resultCheckLang;
        }
        $data = $this->categoryPost->find(166);
        $breadcrumbs = [[
            'id' => $data->id,
            'name' => $data->name,
            'slug' => makeLinkToLanguage('about-us', null, null, \App::getLocale()),
        ]];

        return view("frontend.pages.about-us", [
            "data" => $data,
            'typeBreadcrumb' => 'about-us',
            'title' => $data ? $data->name : "",
            'category' => $data->category ?? null,
            'seo' => [
                'title' =>  $data->title_seo ?? "",
                'keywords' =>  $data->keyword_seo ?? "",
                'description' =>  $data->description_seo ?? "",
                'image' => $data->avatar_path ?? "",
                'abstract' =>  $data->description_seo ?? "",
            ]
        ]);
    }

    public function langdingPage(Request $request)
    {
        $resultCheckLang = checkRouteLanguage2();
        if ($resultCheckLang) {
            return $resultCheckLang;
        }
        $data = CategoryLanding::find(1);

        $breadcrumbs = [[
            'name' => $data->name,
            'slug' => makeLinkToLanguage("$data->name", null, null, \App::getLocale()),
        ]];

        return view("frontend.pages.langding-page", [
            "data" => $data,
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => "$data->name",
            'seo' => [
                'title' =>  "$data->name",
                'keywords' =>   "$data->name",
                'description' =>    "$data->name",
                'image' =>   "$data->name",
                'abstract' =>   "$data->name",
            ]
        ]);
    }

    public function storeAjax(Request $request)
    {
        //   dd($request->name);
        // dd($request->ajax());
        try {
            DB::beginTransaction();

            $dataContactCreate = [
                'name' => $request->input('name'),
                'phone' => $request->input('phone') ?? "",
                'email' => $request->input('email') ?? "",
                'sex' => $request->input('sex') ?? 1,
                'from' => $request->input('from') ?? "",
                'to' => $request->input('to') ?? "",
                'service' => $request->input('service') ?? "",
                'content' => $request->input('content') ?? null,
            ];
            //  dd($dataContactCreate);
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

    public function search(Request $request)
    {
        $dataProduct = $this->product;
        if ($request->has('category_id')) {
            $categoryId = $request->category_id;
            $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
            $dataProduct =  $this->product->whereIn('category_id', $listIdChildren);
        }
        if ($request->input('keyword')) {

            $dataProduct = $dataProduct->where(function ($query) {
                $idProTran = $this->productTranslation->where([
                    ['name', 'like', '%' . request()->input('keyword') . '%']
                ])->pluck('product_id');
                $query->whereIn('id', $idProTran)->orWhere([
                    ['masp', 'like', '%' . request()->input('keyword') . '%']
                ]);
            });
        }

        $dataProduct = $dataProduct->orderBy("order", "ASC")->where('active', 1)->orderBy("created_at", "DESC")->paginate(25);
        $breadcrumbs = [
            'id' => null,
            'name' => 'Kết quả tìm kiếm',
            'slug' => "",
        ];
        return view("frontend.pages.search", [
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'search',
            'dataProduct' => $dataProduct,
            'unit' => $this->unit,
            'seo' => [
                'title' =>  "Kết quả tìm kiếm",
                'keywords' =>  "Kết quả tìm kiếm",
                'description' =>  "Kết quả tìm kiếm",
                'image' =>  "Kết quả tìm kiếm",
                'abstract' =>   "Kết quả tìm kiếm",
            ]
        ]);
    }

    public function saleoff(Request $request)
    {
        $dataProduct = $this->product->where([['sale', 1], ['active', 1]])->orderBy("created_at", "DESC")->paginate(25);
        $breadcrumbs = [
            'id' => null,
            'name' => 'Sản phẩm khuyến mãi',
            'slug' => "",
        ];
        return view("frontend.pages.search", [
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'search',
            'dataProduct' => $dataProduct,
            'unit' => $this->unit,
            'seo' => [
                'title' =>  "Sản phẩm khuyến mãi",
                'keywords' =>  "Sản phẩm khuyến mãi",
                'description' =>  "Sản phẩm khuyến mãi",
                'image' =>  "Sản phẩm khuyến mãi",
                'abstract' =>   "Sản phẩm khuyến mãi",
            ]
        ]);
    }

    public function notFound()
    {
        abort(404);
    }


    public function doiTacDaiLy()
    {
        $category = $this->categoryPost->find(41);
        $breadcrumbs = [];
        $listIdParent = $this->categoryPost->getALlCategoryParentAndSelf($category->id);
        foreach ($listIdParent as $parent) {
            $breadcrumbs[] = $this->categoryPost->select('id')->find($parent)->toArray();
        }
        $maps = $this->setting->find(301);
        return view('frontend.pages.daily', [
            'maps' => $maps,
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'checkKey',
            'category' => $category,

            'seo' => [
                'title' => $category->title_seo ?? "",
                'keywords' => $category->keyword_seo ?? "",
                'description' => $category->description_seo ?? "",
                'image' => $category->avatar_path ?? "",
                'abstract' => $category->description_seo ?? "",
            ]
        ]);
    }

    function getAttributes(Request $request)
    {
        $ids = explode(',', $request->ids);
        $attributes = $this->attribute->where([['parent_id', 0], ['active', 1]])->get();
        if (count($ids) > 0) {
            $categoryProductAttribute = $this->categoryProductAttribute->whereIn('category_product_id', $ids)->pluck('attribute_id')->toArray();
            $attributes = $this->attribute->whereIn('id', $categoryProductAttribute)->where([['parent_id', 0], ['active', 1]])->get();
        }

        $html = view('frontend.components.filter-attribute', compact('attributes'))->render();

        return response()->json([
            "status" => 200,
            'html' => $html
        ], 200);
    }
}
