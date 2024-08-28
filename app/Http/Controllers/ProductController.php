<?php

namespace App\Http\Controllers;

use App\Models\ProductForCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\CategoryPost;
use App\Models\ProductComment;

use App\Models\Setting;
use App\Models\ProductParameter;
use App\Models\Attribute;
use App\Models\ProductAttribute;
use App\Models\ProductStar;
use App\Models\ProductTranslation;
use App\Models\CategoryProductTranslation;
use App\Models\Option;
use App\Models\StarImage;
use App\Traits\StorageImageTrait;

class ProductController extends Controller
{
    //
    use StorageImageTrait;
    private $product;
    private $productStar;
    private $header;
    private $unit = 'đ';
    private $categoryProduct;
    private $categoryPost;
    private $productTranslation;
    private $categoryProductTranslation;
    private $attribute;
    private $productParameter;
    private $productAttribute;
    private $limitProduct = 20;
    private $limitProductRelate = 10;
    private $idCategoryProductRoot = 2;
    private $breadcrumbFirst = [
        // 'name'=>'Sản phẩm',
        //  'slug'=>'san-pham',
    ];
    public $priceSearch;
    public function __construct(
        Product $product,
        ProductStar $productStar,
        CategoryProduct $categoryProduct,
        CategoryPost $categoryPost,
        Setting $setting,
        ProductParameter $productParameter,
        ProductTranslation $productTranslation,
        CategoryProductTranslation $categoryProductTranslation,
        Attribute $attribute,
        ProductAttribute $productAttribute
    ) {
        $this->product = $product;
        $this->productStar = $productStar;
        $this->categoryProduct = $categoryProduct;
        $this->categoryPost = $categoryPost;
        $this->setting = $setting;
        $this->productParameter = $productParameter;
        $this->productTranslation = $productTranslation;
        $this->categoryProductTranslation = $categoryProductTranslation;
        $this->attribute = $attribute;
        $this->productAttribute = $productAttribute;
        $this->priceSearch = config('web_default.priceSearch');
    }
    // danh sách toàn bộ product
    public function index(Request $request)
    {
        $sanpham = $this->categoryProduct->where('parent_id', 36)->get();
        return view('frontend.pages.product-all', [
            'sanpham' => $sanpham,
        ]);
    }
    public function chuyenActive()
    {
        $product = Product::get();
        foreach ($product as $i) {
            $i->active = 0;
            $i->save();
        }
    }
    public function detail($slug, Request $request)
    {
        $breadcrumbs = [];
        $data = [];
        $translation = $this->productTranslation->where([
            ["slug", $slug],
        ])->first();
        if ($translation) {
            $data = $translation->product;
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
            $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);

            $dataRelate =  $this->product->where('active', '1')->where([
                ["id", "<>", $data->id],
            ])->limit($this->limitProductRelate)->get();

            $listIdParent = $this->categoryProduct->getALlCategoryParentAndSelf($categoryId);

            foreach ($listIdParent as $parent) {
                $breadcrumbs[] = $this->categoryProduct->select('id')->find($parent)->toArray();
            }

            // Lấy danh sản các tất cả sản phẩm cùng danh mục sản phẩm được chọn
            $categoryAll = $this->product->where('active', '1')->where('category_id', $categoryId)->get();

            $diachi = $this->setting->find(19);
            $giaohang = $this->setting->find(130);
            $chinhSach = $this->setting->find(171);
            $huongDan = $this->setting->find(172);
            $vanchuyen = $this->setting->find(274);
            $vanchuyen_doitra = $this->setting->find(534);


            if ($data->id == 1) {

                $section_video = $data->params()->where('id', 111)->where('order', 1)->first();


                $tinhnang = $data->params()->where('id', 112)->first();
                $manhinhLed = $data->params()->where('id', 115)->first();
                $manhinhLedMb = $data->params()->where('id', 215)->first();
                $luchut = $data->params()->where('id', 119)->first();


                $phukien = $data->params()->where('id', 129)->first();
                $vanhanh = $data->params()->where('id', 136)->first();
                $tinhnangbosung = $data->params()->where('id', 137)->first();

                $tronghop = $data->params()->where('id', 144)->first();
                $thongso = $data->params()->where('id', 154)->first();

                $huongdansudung = $data->params()->where('id', 210)->first();
                $logo = $data->params()->where('id', 205)->first();


                return view('frontend.pages.product-detail1', [
                    'data' => $data,
                    'logo' => $logo,
                    'luchut' => $luchut,
                    'manhinhLed' => $manhinhLed,
                    'manhinhLedMb' => $manhinhLedMb,
                    'section_video' => $section_video,
                    'tinhnang' => $tinhnang,
                    'phukien' => $phukien,
                    'tinhnangbosung' => $tinhnangbosung,
                    'tronghop' => $tronghop,
                    'thongso' => $thongso,
                    'huongdansudung' => $huongdansudung,

                    'categoryAll' => $categoryAll,
                    'unit' => $this->unit,
                    "dataRelate" => $dataRelate,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'title' => $data ? $data->name : "",
                    'category' => $data->category ?? null,
                    'giaohang' => $giaohang,
                    'chinhSach' => $chinhSach,
                    'huongDan' => $huongDan,
                    'vanchuyen' => $vanchuyen,
                    'diachi' => $diachi,
                    'seo' => [
                        'title' =>  $data->title_seo ?? "",
                        'keywords' =>  $data->keyword_seo ?? "",
                        'description' =>  $data->description_seo ?? "",
                        'image' => $data->avatar_path ?? "",
                        'abstract' =>  $data->description_seo ?? "",
                    ]
                ]);
            } else if ($data->id == 3) {

                $section_video = $data->params()->where('id', 163)->where('order', 1)->first();


                $tienich = $data->params()->where('id', 174)->first();
                $congnghetachbui = $data->params()->where('id', 168)->first();
                $luchut = $data->params()->where('id', 167)->first();


                $boloc = $data->params()->where('id', 169)->first();
                $lamsach3trong1 = $data->params()->where('id', 177)->first();


                $tronghop = $data->params()->where('id', 181)->first();
                $thongso = $data->params()->where('id', 191)->first();

                $huongdansudung = $data->params()->where('id', 211)->first();
                $logo = $data->params()->where('id', 207)->first();

                return view('frontend.pages.product-detail2', [
                    'data' => $data,
                    'logo' => $logo,
                    'luchut' => $luchut,
                    'congnghetachbui' => $congnghetachbui,
                    'section_video' => $section_video,
                    'tienich' => $tienich,
                    'boloc' => $boloc,
                    'lamsach3trong1' => $lamsach3trong1,
                    'tronghop' => $tronghop,
                    'thongso' => $thongso,
                    'huongdansudung' => $huongdansudung,
                    'categoryAll' => $categoryAll,
                    'unit' => $this->unit,
                    "dataRelate" => $dataRelate,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'title' => $data ? $data->name : "",
                    'category' => $data->category ?? null,
                    'giaohang' => $giaohang,
                    'chinhSach' => $chinhSach,
                    'huongDan' => $huongDan,
                    'vanchuyen' => $vanchuyen,
                    'diachi' => $diachi,
                    'seo' => [
                        'title' =>  $data->title_seo ?? "",
                        'keywords' =>  $data->keyword_seo ?? "",
                        'description' =>  $data->description_seo ?? "",
                        'image' => $data->avatar_path ?? "",
                        'abstract' =>  $data->description_seo ?? "",
                    ]
                ]);
            } else if ($data->id == 4) {

                $section_video = $data->params()->where('id', 38)->where('order', 1)->first();


                $lockhongkhi = $data->params()->where('id', 40)->first();
                $boloc = $data->params()->where('id', 47)->first();
                $nhunggibannhanlai = $data->params()->where('id', 51)->first();
                $tienich = $data->params()->where('id', 52)->first();
                $cuakhongcanh = $data->params()->where('id', 53)->first();
                $lantoakhongkhi = $data->params()->where('id', 54)->first();
                $dongco = $data->params()->where('id', 55)->first();
                $tienich2 = $data->params()->where('id', 56)->first();
                $dieukhien = $data->params()->where('id', 59)->first();
                $bandem = $data->params()->where('id', 64)->first();
                $hengio = $data->params()->where('id', 65)->first();
                $giamtiengon = $data->params()->where('id', 66)->first();
                $vesinh = $data->params()->where('id', 67)->first();
                $tiuthudien = $data->params()->where('id', 68)->first();


                $thongso = $data->params()->where('id', 69)->first();

                $logo = $data->params()->where('id', 208)->first();
                $huongdansudung = $data->params()->where('id', 212)->first();

                return view('frontend.pages.product-detail3', [
                    'data' => $data,

                    'tiuthudien' => $tiuthudien,
                    'vesinh' => $vesinh,
                    'giamtiengon' => $giamtiengon,
                    'hengio' => $hengio,
                    'bandem' => $bandem,
                    'dieukhien' => $dieukhien,
                    'tienich2' => $tienich2,
                    'tienich' => $tienich,
                    'logo' => $logo,
                    'dongco' => $dongco,
                    'cuakhongcanh' => $cuakhongcanh,
                    'lantoakhongkhi' => $lantoakhongkhi,
                    'nhunggibannhanlai' => $nhunggibannhanlai,
                    'section_video' => $section_video,
                    'lockhongkhi' => $lockhongkhi,
                    'boloc' => $boloc,
                    'thongso' => $thongso,
                    'huongdansudung' => $huongdansudung,

                    'categoryAll' => $categoryAll,
                    'unit' => $this->unit,
                    "dataRelate" => $dataRelate,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'title' => $data ? $data->name : "",
                    'category' => $data->category ?? null,
                    'giaohang' => $giaohang,
                    'chinhSach' => $chinhSach,
                    'huongDan' => $huongDan,
                    'vanchuyen' => $vanchuyen,
                    'diachi' => $diachi,
                    'seo' => [
                        'title' =>  $data->title_seo ?? "",
                        'keywords' =>  $data->keyword_seo ?? "",
                        'description' =>  $data->description_seo ?? "",
                        'image' => $data->avatar_path ?? "",
                        'abstract' =>  $data->description_seo ?? "",
                    ]
                ]);
            } else if ($data->id == 5) {

                $section_video = $data->params()->where('id', 78)->where('order', 1)->first();


                $lamsachkhouot = $data->params()->where('id', 79)->first();
                $kiemsoat = $data->params()->where('id', 80)->first();
                $thoiluong = $data->params()->where('id', 85)->first();
                $tinhnang = $data->params()->where('id', 81)->first();


                $tinhnangbosung = $data->params()->where('id', 87)->first();
                $dongco = $data->params()->where('id', 86)->first();


                $tronghop = $data->params()->where('id', 92)->first();
                $thongso = $data->params()->where('id', 102)->first();

                $logo = $data->params()->where('id', 209)->first();
                $huongdansudung = $data->params()->where('id', 213)->first();

                return view('frontend.pages.product-detail4', [
                    'data' => $data,

                    'huongdansudung' => $huongdansudung,
                    'section_video' => $section_video,
                    'thoiluong' => $thoiluong,
                    'tinhnang' => $tinhnang,
                    'tinhnangbosung' => $tinhnangbosung,
                    'tronghop' => $tronghop,
                    'logo' => $logo,
                    'thongso' => $thongso,
                    'kiemsoat' => $kiemsoat,
                    'lamsachkhouot' => $lamsachkhouot,
                    'dongco' => $dongco,

                    'categoryAll' => $categoryAll,
                    'unit' => $this->unit,
                    "dataRelate" => $dataRelate,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'title' => $data ? $data->name : "",
                    'category' => $data->category ?? null,
                    'giaohang' => $giaohang,
                    'chinhSach' => $chinhSach,
                    'huongDan' => $huongDan,
                    'vanchuyen' => $vanchuyen,
                    'diachi' => $diachi,
                    'seo' => [
                        'title' =>  $data->title_seo ?? "",
                        'keywords' =>  $data->keyword_seo ?? "",
                        'description' =>  $data->description_seo ?? "",
                        'image' => $data->avatar_path ?? "",
                        'abstract' =>  $data->description_seo ?? "",
                    ]
                ]);
            } else {

                $section_video = $data->params()->where('parent_id', 0)->where('order', 1)->first();

                $tinhnang = $data->params()->where('parent_id', 0)->where('order', 2)->first();

                $tronghop = $data->params()->where('parent_id', 0)->where('order', 3)->first();

                $thongso = $data->params()->where('parent_id', 0)->where('order', 4)->first();

                $huongdansudung = $data->params()->where('parent_id', 0)->where('order', 5)->first();

                $test = 1;
                return view('frontend.pages.product-detail', [
                    'test' => $test,
                    'data' => $data,
                    'section_video' => $section_video,
                    'tinhnang' => $tinhnang,
                    'tronghop' => $tronghop,
                    'thongso' => $thongso,
                    'huongdansudung' => $huongdansudung,
                    'categoryAll' => $categoryAll,
                    'unit' => $this->unit,
                    "dataRelate" => $dataRelate,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'title' => $data ? $data->name : "",
                    'category' => $data->category ?? null,
                    'giaohang' => $giaohang,
                    'chinhSach' => $chinhSach,
                    'huongDan' => $huongDan,
                    'vanchuyen' => $vanchuyen,
                    'vanchuyen_doitra' => $vanchuyen_doitra,
                    'diachi' => $diachi,
                    'seo' => [
                        'title' =>  $data->title_seo ?? "",
                        'keywords' =>  $data->keyword_seo ?? "",
                        'description' =>  $data->description_seo ?? "",
                        'image' => $data->avatar_path ?? "",
                        'abstract' =>  $data->description_seo ?? "",
                    ]
                ]);
            }
        }
    }

    public function UpdateOptionPrice(Request $request)
    {
        $product_id = $request->product_id;
        $size = $request->size;

        $price = DB::table('options')
            ->select('product_id', 'price')
            ->where('product_id', $product_id)
            ->where('size', $size)
            ->first();

        if ($price) {
            return response()->json([
                'success' => true,
                'price' => $price->price
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'null'
        ]);

    }

    public function loadPrice(Request $request)
    {
        $kichthuoc = $request->input('kichthuoc');
        $result = Option::where('size', $kichthuoc)->first();

        if ($result) {
            $price = number_format($result->price) . 'đ';
            $id_option = $result->id;
        } else {
            $price = 'Chưa có loại này';
            $id_option = null;
        }

        return response()->json([
            'code' => 200,
            'price' => $price,
            'id_option' => $id_option,
        ]);
    }


    public function filterProducts(Request $request)
    {
        $categoryId = $request->input("categoryId");
        $category = CategoryProduct::find($categoryId);
        $attributeIds = $request->input('attributeIds', []);

        $filteredProducts = [];

        $product_id = ProductForCategory::where('category_id', $categoryId)->pluck('product_id')->toArray();


        if (!empty($attributeIds)) {
            $products_id = $this->productAttribute->whereIn('attribute_id', $attributeIds)
                ->pluck('product_id')->toArray();

            $products = $this->product->whereIn('id', $products_id)->whereIn('id', $product_id)
                ->where('active', 1)->get();
            $filteredProducts = $products->toArray();
        } else {
            $products = $this->product->whereIn('id', $product_id)
                ->where('active', 1)->get();
            $filteredProducts = $products->toArray();
        }

        $id = array_column($filteredProducts, 'id');
        $filteredProducts = $this->product->whereIn('id', $product_id)->whereIn('id', $id)
            ->orderByRaw(DB::raw("FIELD(id, " . implode(',', $id) . ")"))
            ->paginate(9);


        return view('frontend.pages.product-by-category-ajax02', compact('filteredProducts', 'category'))->render();
    }

    public function rating($id, Request $request)
    {

        if ($id) {
            try {
                DB::beginTransaction();
                $title = 'Đánh giá sản phẩm';

                // Tạo dữ liệu đánh giá
                $dataRatingCreate = [
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'title' => $request->input('title') ?? "",
                    "parent_id" => $request->input('parent_id') ?? 0,
                    'star' => $request->input('star') ?? "5",
                    'product_id' => $id,
                    'active' => 0,
                    'content' => $request->input('content') ?? "",
                ];

                $ratingUdate = ProductStar::create($dataRatingCreate);

                if ($request->hasFile("image")) {
                    $dataProductStarImageCreate1 = [];
                    foreach ($request->file('image') as $fileItem) {
                        $dataProductStarImageDetail1 = $this->storageTraitUploadMutiple($fileItem, "star");
                        $dataProductStarImageCreate1[] = [
                            "name" => $dataProductStarImageDetail1["file_name"],
                            "image_path" => $dataProductStarImageDetail1["file_path"]
                        ];
                    }
                    // insert database in product_images table by createMany
                    $productImage1 =   $ratingUdate->images()->createMany($dataProductStarImageCreate1);
                }

                DB::commit();

                return response()->json([
                    'code' => 200,
                    'message' => 'Đánh giá sao đã được gửi thành công',
                ]);
                // session()->flash('success', 'Đánh giá sao đã được gửi thành công');
                // return redirect()->back()->with('arlert', 'Cám ơn bạn đã gửi đánh giá cho chúng tôi! Bình luận của bạn sẽ được xét duyệt trước khi được hiển thị.');
            } catch (\Exception $exception) {
                DB::rollBack();
                return response()->json([
                    'code' => 500,
                    'message' => 'Đánh giá của bạn gửi không thành công! Vui lòng gửi lại',
                ]);
                // return redirect()->back()->with('arlert', 'Đánh giá của bạn gửi không thành công! Vui lòng gửi lại');
            }
        }
    }


    public function comment($id, Request $request)
    {
        // dd($request->all());
        if ($id) {
            try {
                DB::beginTransaction();
                $title = 'Bình luận sản phẩm';

                // Tạo dữ liệu đánh giá
                $dataRatingCreate = [
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    "parent_id" => $request->input('parent_id') ?? 0,
                    'product_id' => $id,
                    'active' => 0,
                    'content' => $request->input('content') ?? "",
                ];
                if ($request->has('gender')) {
                    $dataRatingCreate['name'] = $request->input('gender') . ': ' . $request->input('name');
                } else {
                    $dataRatingCreate['name'] = $request->input('name');
                }
                $ratingUdate = ProductComment::create($dataRatingCreate);

                DB::commit();

                return response()->json([
                    'code' => 200,
                    'message' => 'Bình luận đã được gửi thành công',
                ]);
                // session()->flash('success', 'Đánh giá sao đã được gửi thành công');
                // return redirect()->back()->with('arlert', 'Cám ơn bạn đã gửi đánh giá cho chúng tôi! Bình luận của bạn sẽ được xét duyệt trước khi được hiển thị.');
            } catch (\Exception $exception) {
                dd($exception);
                DB::rollBack();
                return response()->json([
                    'code' => 500,
                    'message' => 'Bình luận không thành công! Vui lòng gửi lại',
                ]);
                // return redirect()->back()->with('arlert', 'Đánh giá của bạn gửi không thành công! Vui lòng gửi lại');
            }
        }
    }

    public function productSale(Request $request){

        $dataProduct = $this->product->where([
            ['active', 1],
            ['sale', 1],
            ['price', '>', 0],
            ['old_price', '>', 0]
        ])->orderBy('id', 'desc')->paginate(12);

        return view('frontend.pages.product-sale', [

            'dataProduct' => $dataProduct,

            'seo' => [
                'title' =>  "Sản phẩm khuyến mại",
                'keywords' =>  "Sản phẩm khuyến mại",
                'description' =>  "Sản phẩm khuyến mại",
                'image' => "Sản phẩm khuyến mại",
                'abstract' =>  "Sản phẩm khuyến mại",
            ]
        ]);
    }
}
