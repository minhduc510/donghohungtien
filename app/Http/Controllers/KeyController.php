<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Key;
use App\Models\Tag;

use App\Models\City;
use App\Models\Post;
use App\Models\Galaxy;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Setting;

use App\Models\PostCate;
use App\Models\Supplier;
use App\Models\Variants;
use App\Models\Attribute;
use App\Models\ProductTab;
use App\Models\ProductStar;
use Illuminate\Support\Str;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Models\CategoryGalaxy;

use App\Models\CategoryProduct;
use App\Models\PostTranslation;
use App\Models\ProductAttribute;

use App\Models\ProductAndProduct;
use App\Models\ProductForCategory;
use App\Models\ProductTranslation;
use App\Models\CategoryPostTranslation;
use App\Models\CategoryProductAttribute;
use App\Models\CategoryProductTranslation;

class KeyController extends Controller
{
    private $post;
    private $categoryGalaxy;
    private $galaxy;
    private $product;
    private $productTab;
    private $key;
    private $categoryPost;
    private $categoryProduct;
    private $productStar;
    private $unit = 'đ';
    private $variants;

    private $limitPost = 12;
    private $limitPostRelate = 7;
    private $idCategoryPostRoot = 21;
    private $limitProduct = 9;
    private $sliderLimit = 8;
    private $limitProductRelate = 6;
    private $idCategoryProductRoot = 185;
    private $idCategoryGalaxyRoot = 1;
    private $limitCategoryGalaxy = 10;
    private $limitGalaxyRelate = 20;
    private $limitGalaxy = 20;
    private $attribute;
    private $productAttribute;
    private $postTranslation;
    private $productTranslation;
    private $categoryPostTranslation;
    private $categoryProductTranslation;
    private $setting;
    private $supplier;
    private $breadcrumbFirst = [];
    private $categoryProductAttribute;
    public function __construct(
        CategoryProductAttribute $categoryProductAttribute,
        Post $post,
        Product $product,
        ProductTab $productTab,
        Key $key,
        Attribute $attribute,
        Variants $variants,
        ProductAttribute $productAttribute,
        ProductStar $productStar,
        CategoryPost $categoryPost,
        CategoryProduct $categoryProduct,
        PostTranslation $postTranslation,
        ProductTranslation $productTranslation,
        CategoryPostTranslation $categoryPostTranslation,
        CategoryProductTranslation $categoryProductTranslation,
        Setting $setting,
        CategoryGalaxy $categoryGalaxy,
        Galaxy $galaxy,
        Supplier $supplier
    ) {
        $this->categoryProductAttribute = $categoryProductAttribute;
        $this->supplier = $supplier;
        $this->post = $post;
        $this->productTab = $productTab;
        $this->categoryGalaxy = $categoryGalaxy;
        $this->galaxy = $galaxy;
        $this->product = $product;
        $this->variants = $variants;
        $this->productStar = $productStar;
        $this->key = $key;
        $this->attribute = $attribute;
        $this->productAttribute = $productAttribute;
        $this->categoryPost = $categoryPost;
        $this->categoryProduct = $categoryProduct;
        $this->postTranslation = $postTranslation;
        $this->productTranslation = $productTranslation;
        $this->categoryPostTranslation = $categoryPostTranslation;
        $this->categoryProductTranslation = $categoryProductTranslation;
        $this->setting = $setting;
        $this->priceSearch = config('web_default.priceSearch');
        $this->breadcrumbFirst = [
            'name' => 'Tin tức',
            'slug' => makeLink("post_all"),
            'id' => null,
        ];
    }

    public function checkKey($slug, Request $request)
    {
        $breadcrumbs = [];
        $data = [];
        $translation = $this->key->where([
            ["slug", $slug],
        ])->first();

        if ($translation) {
            if ($translation->type == 1) {

                $category = $translation->categoryPost;
                if (checkRouteLanguage($slug, $category)) {
                    return checkRouteLanguage($slug, $category);
                }


                if ($category) {
                    if ($category->count()) {
                        $categoryId = $category->id;
                        $listId_postCate = PostCate::where('category_id', $categoryId)->pluck('post_id')->toArray();
                        $data = $this->post->whereIn('id', $listId_postCate)->where('active', 1)->orderBy('created_at', 'DESC')->paginate($this->limitPost);
                        $listIdParent = $this->categoryPost->getALlCategoryParentAndSelf($categoryId);
                        $categoryNew = $this->categoryPost->whereIn(
                            'id',
                            [$listIdParent[0]]
                        )->get();
                        foreach ($listIdParent as $parent) {
                            $breadcrumbs[] = $this->categoryPost->select('id')->find($parent)->toArray();
                        }
                        $nd = $this->setting->find(121);
                        return view('frontend.pages.post-by-category', [
                            'nd' => $nd,
                            'data' => $data,
                            'unit' => $this->unit,
                            'breadcrumbs' => $breadcrumbs,
                            'categoryPostSidebar' => $categoryNew,
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
                }
            } elseif ($translation->type == 2) {
                $data = $translation->post;
                if (checkRouteLanguage($slug, $data)) {
                    return checkRouteLanguage($slug, $data);
                }
                $viewUpdate = $data->view;
                if ($data->view) {
                    $viewUpdate++;
                } else {
                    $viewUpdate = 1;
                }
                $data->update([
                    'view' => $viewUpdate,
                ]);

                $categoryId = $data->category_id;

                $listIdChildren = $this->categoryPost->getALlCategoryChildrenAndSelf($categoryId);

                $dataRelate = $this->post->whereIn('category_id', $listIdChildren)->where([
                    ["id", "<>", $data->id],
                ])->orderBy('created_at', 'desc')->limit($this->limitPostRelate)->get();

                $dataView = $this->post->where([
                    ["id", "<>", $data->id],
                ])->orderBy('id', 'desc')->limit($this->limitPostRelate)->get();

                $listIdParent = $this->categoryPost->getALlCategoryParentAndSelf($categoryId);

                foreach ($listIdParent as $parent) {
                    $breadcrumbs[] = $this->categoryPost->select('id')->find($parent)->toArray();
                }

                $tt = $this->setting->find(113);

                $bannerRight = $this->setting->where('active', 1)->find(282);


                return view('frontend.pages.post-detail', [
                    'bannerRight' => $bannerRight,
                    'tt' => $tt,
                    'data' => $data,
                    "dataRelate" => $dataRelate,
                    'dataView' => $dataView,
                    'breadcrumbs' => $breadcrumbs,


                    'typeBreadcrumb' => 'checkKey',
                    'title' => $data ? $data->name : "",
                    'category' => $data->category ?? null,
                    'seo' => [
                        'title' => $data->title_seo ?? "",
                        'keywords' => $data->keyword_seo ?? "",
                        'description' => $data->description_seo ?? "",
                        'image' => $data->avatar_path ?? "",
                        'abstract' => $data->description_seo ?? "",

                    ]
                ]);
            } elseif ($translation->type == 3) {
                // Danh sách sản phẩm
                if ($translation->count()) {
                    $category = $translation->categoryProduct;

                    $category_all = $this->categoryProduct->where('active', 1)->find(276);

                    $categories = $this->categoryProduct->getALlCategoryChildrenAndSelf($category->id);
                    $listIdProduct = ProductForCategory::whereIn('category_id', $categories)->pluck('product_id')->toArray();
                    $products = $this->product->where('active', 1)->whereIn('id', $listIdProduct);
                    $attributes_sex  = $this->attribute->where([['active', 1], ['parent_id', 127]])->orderBy('order', 'desc')->get();

                    $product_brands = $products->pluck('supplier_id')->toArray();
                    $brands = $this->supplier->where('active', 1)->whereIn('id', $product_brands)->orderBy('order', 'asc')->get();

                    $category_total = false;
                    $prices = $this->attribute->where('active', 1)->find(157);

                    $categoryProductAttribute = $this->categoryProductAttribute->where('category_product_id', $category->id)->whereNotIn('attribute_id', [$prices->id, ...$prices->childs()->pluck('id')->toArray()])->pluck('attribute_id')->toArray();
                    $categoryProductAttribute_total = $this->categoryProductAttribute->where('category_product_id', $category->id)->pluck('attribute_id')->toArray();
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



                    $attributes = $this->attribute->whereIn('id', $arr)->where([['parent_id', 0], ['active', 1], ['hot', 1]])->orderBy('order', 'asc')->get();
                    $attributes_total = $this->attribute->whereIn('id', $arr)->where([['parent_id', 0], ['active', 1], ['hot', 1]])->orderBy('order', 'asc')->get();


                    $total_products = $products->count();
                    $products = $products->paginate(20);

                    return view('frontend.pages.product-by-category', [
                        'categoryProductAttribute_total' => $categoryProductAttribute_total,
                        'categoryProductAttribute' => $categoryProductAttribute,
                        'category_all' => $category_all,
                        'prices' => $prices,
                        'category' => $category,
                        'brands' => $brands,
                        'attributes_sex' => $attributes_sex,
                        'categoryId' => $category->id,
                        'category_total' => $category_total,
                        'attributes_total' => $attributes_total,
                        'attributes' => $attributes,
                        'total_products' => $total_products,
                        'products' => $products,
                        'seo' => [
                            'title' => $category->title_seo ?? "",
                            'keywords' => $category->keyword_seo ?? "",
                            'description' => $category->description_seo ?? "",
                            'image' => $category->avatar_path ?? "",
                            'abstract' => $category->description_seo ?? "",
                        ]
                    ]);
                }
            } elseif ($translation->type == 4) {
                // Chi tiết sản phẩm
                $data = $translation->product;

                $view = $data->view;

                $data->update([
                    'view' => $view + 1,
                ]);

                if (checkRouteLanguage($slug, $data)) {
                    return checkRouteLanguage($slug, $data);
                }

                if ($request->ajax()) {

                    if ($request->color_id) {

                        $color_id = $request->color_id;

                        $dataColor = $data->options()->find($color_id);

                        $view_color = view('frontend.components.load-product-color', [
                            'data' => $dataColor,
                            'product' => $data,
                        ])->render();

                        $view_size = view('frontend.components.load-product-size', [
                            'data' => $dataColor,
                        ])->render();

                        return response()->json([
                            'code' => 200,
                            'view_color' => $view_color,
                            'view_size' => $view_size,
                            'messange' => 'success'
                        ], 200);
                    }
                }

                $categoryId = $data->category_id;
                $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
                $it = ProductForCategory::whereIn('category_id', $listIdChildren)->pluck('product_id')->toArray();
                $dataRelate = $this->product->where([['active', '1'], ['supplier_id', $data->supplier_id]])->whereIn('id', $it)->where([
                    ["id", "<>", $data->id],
                ])->limit($this->limitProductRelate)->get();
                $listIdParent = $this->categoryProduct->getALlCategoryParentAndSelf($categoryId);
                $listIdActive = $listIdParent;
                foreach ($listIdParent as $parent) {
                    $breadcrumbs[] = $this->categoryProduct->select('id')->find($parent)->toArray();
                }
                $categoryAll = $this->product->where('active', '1')->where('category_id', $categoryId)->get();

                $productSale = $this->product->where([
                    ['active', 1],
                    ['old_price', '>', 0],
                ])->latest()->orderBy('old_price', 'desc')->get();

                $avgRating = 0;
                $sumRating = array_sum(array_column($data->stars()->where('active', 1)->get()->toArray(), 'star'));
                $countRating = count($data->stars()->where('active', 1)->where('parent_id', 0)->get());

                if ($countRating != 0) {
                    $avgRating = round($sumRating / $countRating, 2);
                }

                $star5 = $data->stars()->where([
                    ['active', 1],
                    ['star', 5],
                ])->get();

                $star4 = $data->stars()->where([
                    ['active', 1],
                    ['star', 4],
                ])->get();

                $star3 = $data->stars()->where([
                    ['active', 1],
                    ['star', 3],
                ])->get();

                $star2 = $data->stars()->where([
                    ['active', 1],
                    ['star', 2],
                ])->get();

                $star1 = $data->stars()->where([
                    ['active', 1],
                    ['star', 1],
                ])->get();
                $download = $this->categoryPost->find(19);
                $huong_dan = $this->categoryPost->find(20);
                $noidung = $this->setting->find(118);
                $chi_tiet = $this->setting->find(124);

                $banner = $this->setting->where('active', 1)->find(188);
                $loiich = $this->setting->where('active', 1)->find(189);
                $km = $this->setting->where('active', 1)->find(194);
                $dki = $this->setting->where('active', 1)->find(195);
                $kichthuoc = $this->setting->where('active', 1)->find(197);
                $cauhoi = $this->setting->where('active', 1)->find(201);
                $dd_hot = $this->productTab->where('product_id', $data->id)->get();

                $id_sp_ghep = ProductAndProduct::where('main_product_id', $data->id)->pluck('compound_product_id')->toArray();
                $sp_ghep = Product::whereIn('id', $id_sp_ghep)->where('active', 1)->orderBy('order')->orderByDesc('created_at')->get();

                $ProductStar = new ProductStar();
                $countStarSum = $ProductStar->where([
                    ['product_id', '=', $data->id],
                    ['active', '=', 1],
                ])->count();
                $countStar4 = $ProductStar->where([
                    ['product_id', '=', $data->id],
                    ['active', '=', 1],
                    ['star', '=', 5],
                ])->count();
                $countStar3 = $ProductStar->where([
                    ['product_id', '=', $data->id],
                    ['active', '=', 1],
                    ['star', '=', 4],
                ])->count();
                $countStar2 = $ProductStar->where([
                    ['product_id', '=', $data->id],
                    ['active', '=', 1],
                    ['star', '=', 3],
                ])->count();
                $countStar1 = $ProductStar->where([
                    ['product_id', '=', $data->id],
                    ['active', '=', 1],
                    ['star', '=', 2],
                ])->count();
                $countStar0 = $ProductStar->where([
                    ['product_id', '=', $data->id],
                    ['active', '=', 1],
                    ['star', '=', 1],
                ])->count();
                $point_5 = $countStar4 * 5;
                $point_4 = $countStar3 * 4;
                $point_3 = $countStar2 * 3;
                $point_2 = $countStar1 * 2;
                $point_1 = $countStar0 * 1;
                $point_number = ($point_5 + $point_4 + $point_3 + $point_2 + $point_1);
                $star_number = ($countStar4 + $countStar3 + $countStar2 + $countStar1 + $countStar0);
                if ($star_number > 0) {
                    $medium = $point_number / $star_number;
                    $rounded_medium = round($medium, 1);
                }

                $baohanh_chinhsach = $this->setting->where('active', 1)->find(295);
                $uu_dai = $this->setting->where('active', 1)->find(305);
                $uu_dai2 = $this->setting->where('active', 1)->find(342);

                $hd_muahang = $this->post->where('active', 1)->find(11);
                $hd_thanhtoan = $this->post->where('active', 1)->find(12);

                $attributes_id = $this->productAttribute->where('product_id', $data->id)->pluck('attribute_id')->toArray();
                $attributes = $this->attribute->whereIn('id', $attributes_id)->get();
                // $attributes = $this->attribute->whereIn('id', [122, 128, 132, 129, 141, 126, 138, 127])->get();
                $attributeData = [];
                foreach ($attributes as $attribute) {
                    $parentAttribute = $attribute->parent()->where('active', 1)->first();
                    if ($parentAttribute && in_array($parentAttribute->id, [122, 128, 132, 130, 141, 152, 137, 155, 126, 138, 133, 127])) {
                        $attributeData[] = [
                            'order' => $parentAttribute->order,
                            'name' => $parentAttribute->name,
                            'value' => $attribute->name,
                            'id' => $parentAttribute->id,
                        ];
                    }
                }
                // usort($attributeData, function ($a, $b) {
                //     return $a['order'] <=> $b['order'];
                // });
                if ($data->warranty) {
                    $attributeData[] = [
                        'name' => 'Kích thước',
                        'value' => $data->warranty,
                        'id' => 3173,
                    ];
                }
                if ($data->color) {
                    $attributeData[] = [
                        'name' => 'Đường kính',
                        'value' => $data->color,
                        'id' => 135,
                    ];
                }
                $order = [122, 128, 132, 135, 130, 141, 152, 3173, 138, 155, 126, 137, 133, 127];

                $orderMap = array_flip($order);
                // dd($orderMap);

                // Lọc các phần tử chỉ giữ những phần tử có id nằm trong mảng $order
                $filteredData = array_filter($attributeData, function ($item) use ($orderMap) {
                    return isset($orderMap[$item['id']]);
                });

                // Sắp xếp mảng theo thứ tự của id
                usort($filteredData, function ($a, $b) use ($orderMap) {
                    return $orderMap[$a['id']] - $orderMap[$b['id']];
                });
                $attributeData = $filteredData;

                // dd($attributeData);
                return view('frontend.pages.product-detail', [
                    'attributeData' => $attributeData,
                    'uu_dai2' => $uu_dai2,
                    'uu_dai' => $uu_dai,
                    'hd_muahang' => $hd_muahang,
                    'hd_thanhtoan' => $hd_thanhtoan,
                    'baohanh_chinhsach' => $baohanh_chinhsach,
                    'cauhoi' => $cauhoi,
                    'kichthuoc' => $kichthuoc,
                    'dki' => $dki,
                    'sp_ghep' => $sp_ghep,
                    'dd_hot' => $dd_hot,
                    'km' => $km,
                    'loiich' => $loiich,
                    'banner' => $banner,
                    'chi_tiet' => $chi_tiet,
                    'noidung' => $noidung,
                    'huong_dan' => $huong_dan,
                    'download' => $download,
                    'data' => $data,
                    'star5' => $star5,
                    'star4' => $star4,
                    'star3' => $star3,
                    'star2' => $star2,
                    'star1' => $star1,
                    'avgRating' => $avgRating,
                    'countRating' => $countRating,
                    'productSale' => $productSale,
                    'categoryAll' => $categoryAll,
                    'unit' => $this->unit,
                    "dataRelate" => $dataRelate,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'checkKey',
                    'title' => $data ? $data->name : "",
                    'category' => $data->category ?? null,
                    'categoryProductActive' => $listIdActive,
                    'rounded_medium' => $rounded_medium ?? "",
                    'seo' => [
                        'title' => $data->title_seo ?? "",
                        'keywords' => $data->keyword_seo ?? "",
                        'description' => $data->description_seo ?? "",
                        'image' => $data->avatar_path ?? "",
                        'abstract' => $data->description_seo ?? "",
                    ]
                ]);
            } else {
                return redirect()->route('not-found');
            }
        } else {
            return redirect()->route('not-found');
        }
    }


    public function filter($category, $request)
    {
        $data = $this->product->where('active', 1);
        $categoryId = $this->categoryProduct->getALlCategoryChildrenAndSelf($category->id);
        $listId_productCate = ProductForCategory::whereIn('category_id', $categoryId)->pluck('product_id')->toArray();
        $data = $data->whereIn('id', $listId_productCate);

        if ($request->input('search')) {
            $data = $data->where(function ($query) {
                $idProTran = $this->productTranslation->where([
                    ['name', 'like', '%' . request()->input('search') . '%']
                ])->pluck('product_id');
                $query->whereIn('id', $idProTran)->orWhere([
                    ['masp', 'like', '%' . request()->input('search') . '%']
                ]);
            });
        }

        $dataIds = $request->dataIds;
        if ($request->has('dataIds')) {
            // Mảng chứa các phần tử dương
            $arrayAttribute = array_filter($dataIds, function ($value) {
                return $value > 0; // Lọc các giá trị dương
            });

            // Mảng chứa các phần tử âm
            $arrayPrice = array_filter($dataIds, function ($value) {
                return $value < 0; // Lọc các giá trị âm
            });
            $priceRanges = [
                -1 => [0, 5000000],
                -2 => [5000000, 7000000],
                -3 => [7000000, 10000000],
                -4 => [10000000, 15000000],
                -5 => [15000000, 20000000],
                -6 => [20000000, PHP_INT_MAX],
            ];


            if (count($arrayAttribute) > 0) {
                $product_id = ProductAttribute::whereIn('attribute_id', $arrayAttribute)->pluck('product_id')->toArray();
                $data = $data->whereIn('id', $product_id);
            }

            if (count($arrayPrice) > 0) {
                foreach ($arrayPrice as $price) {
                    $data = $data->whereBetween('price', $priceRanges[$price]);
                }
            }
        }
        if ($request->input('order_with')) {
            $keyOrder = $request->input('order_with');
            switch ($keyOrder) {
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
                    $orderby = $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            $data = $data->orderBy(...$orderby);
        } else {
            $data = $data->orderBy("id", "DESC");
        }

        $data = $data->paginate(12);
        $html = view('frontend.pages.product-by-category-ajax02', compact('data'))->render();
        return response()->json([
            'code' => 200,
            'html' => $html,
        ]);
    }
}
