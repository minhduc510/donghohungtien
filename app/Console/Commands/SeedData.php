<?php

namespace App\Console\Commands;

use App\Models\Key;
use App\Models\Post;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Attribute;
use App\Models\CategoryPost;
use App\Models\CategoryProduct;
use App\Models\PostTranslation;
use Illuminate\Console\Command;
use App\Models\ProductForCategory;
use App\Models\ProductTranslation;
use Illuminate\Support\Facades\DB;
use App\Models\SupplierTranslation;
use Illuminate\Support\Facades\Log;
use App\Models\AttributeTranslation;
use App\Models\CategoryPostTranslation;
use App\Models\CategoryProductTranslation;

class SeedData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->handleCategory();
        $this->handleProduct();
        // $this->handleSupplier();
        // $this->handleAttribute();
    }

    public function handleCategory()
    {
        DB::beginTransaction();

        try {
            DB::commit();
            $categories = DB::table('cat_old')->get();
            $posts = DB::table('news_old')->get();
            $dataCategory = [];
            $dataCategoryTranlations = [];
            $dataPost = [];
            $dataPostTranlations = [];
            $listCategories = DB::table('cat_old')->get()->pluck('id_cat')->toArray();
            $keys = [];
            foreach ($categories as $category) {
                $dataCategory[] = [
                    'id' => $category->id_cat,
                    'icon_path' => $category->small_image ? '/images/' . $category->small_image : '',
                    'avatar_path' => $category->image ? '/images/' . $category->image : '',
                    'active' => 1,
                    'admin_id' => 2,
                    'hot' => 0,
                    'parent_id' => $category->parentid,
                ];
                $dataCategoryTranlations[] = [
                    'name' => $category->name,
                    'description' => $category->description,
                    'description_seo' => $category->description,
                    'keyword_seo' => $category->keywords,
                    'title_seo' => $category->title,
                    'content' => $category->noi_dung,
                    'category_id' => $category->id_cat,
                    'language' => 'vi',
                ];
                $key = DB::table('tbl_key_old')->where([['theloai', 3], ['id', $category->id_cat]])->first();
                if ($key) {
                    $keys[] = [
                        'slug' => $key->id_key,
                        'type' => 1,
                        'language' => 'vi',
                        'key_id' => $category->id_cat,
                    ];
                }
            }
            foreach ($posts as $post) {
                if (in_array($post->id_cat, $listCategories)) {
                    $dataPost[] = [
                        'id' => $post->id_news,
                        'avatar_path' => $post->image ? '/images/' . $post->image : '',
                        'file' => $post->normal_image ? '/images/' . $post->normal_image : '',
                        'hot' => 0,
                        'active' => 1,
                        'admin_id' => 2,
                        'category_id' => $post->id_cat,
                    ];
                    $dataPostTranlations[] = [
                        'name' => $post->name,
                        'description' => $post->gioi_thieu,
                        'description_seo' => $post->keywords,
                        'keyword_seo' => $post->keywords,
                        'title_seo' => $post->title,
                        'content' => $post->noi_dung,
                        'post_id' => $post->id_news,
                        'language' => 'vi',
                    ];
                    $key = DB::table('tbl_key_old')->where([['theloai', 4], ['id', $post->id_news]])->first();
                    if ($key) {
                        $keys[] = [
                            'slug' => $key->id_key,
                            'type' => 2,
                            'language' => 'vi',
                            'key_id' => $post->id_news,
                        ];
                    }
                }
            }
            // dd($keys);
            // CategoryPost::insert($dataCategory);
            // CategoryPostTranslation::insert($dataCategoryTranlations);
            // Post::insert($dataPost);
            // PostTranslation::insert($dataPostTranlations);
            Key::insert($keys);

            // dd($keys);
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            DB::rollback();
        }
    }

    public function handleProduct()
    {
        DB::beginTransaction();

        try {
            DB::commit();
            $categories_product = DB::table('catpd_old')->get();
            $products = DB::table('product_old')->get();
            $dataCategoryProduct = [];
            $dataCategoryProductTranlations = [];
            $dataProduct = [];
            $dataProductTranlations = [];
            $product_for_category = [];
            $keys = [];
            foreach ($categories_product as $category_product) {
                $dataCategoryProduct[] = [
                    'id' => $category_product->id_catpd,
                    'avatar_path' => $category_product->image ? '/images/' . $category_product->image : '',
                    'active' => 1,
                    'hot' => 0,
                    'admin_id' => 2,
                    'parent_id' => $category_product->parentid,
                ];
                $dataCategoryProductTranlations[] = [
                    'name' => $category_product->name,
                    'description' => $category_product->description,
                    'description_seo' => $category_product->description,
                    'keyword_seo' => $category_product->keywords,
                    'title_seo' => $category_product->title,
                    'category_id' => $category_product->id_catpd,
                    'language' => 'vi',
                ];
                $key = DB::table('tbl_key_old')->where([['theloai', 1], ['id', $category_product->id_catpd]])->first();
                if ($key) {
                    $keys[] = [
                        'slug' => $key->id_key,
                        'type' => 3,
                        'language' => 'vi',
                        'key_id' => $category_product->id_catpd,
                    ];
                }
            }
            foreach ($products as $product) {
                $dataProduct[] = [
                    'id' => $product->id_product,
                    'masp' => $product->masanpham,
                    'price' => $product->price,
                    'old_price' => gettype($product->gia_cu) === 'integer' ? $product->gia_cu : 0,
                    'sale' => $product->ban_chay,
                    'sp_ngoc' => $product->khuyen_mai,
                    'hot' => 0,
                    'avatar_path' => $product->image ? '/images/' . $product->image : '',
                    'avatar_path2' => $product->small_image ? '/images/' . $product->small_image : '',
                    'avatar_path3' => $product->normal_image ? '/images/' . $product->normal_image : '',
                    'active' => $product->active,
                    'category_id' => $product->id_catpd,
                    'supplier_id' => $product->id_hangsx,
                    'admin_id' => 2,
                ];
                $dataProductTranlations[] = [
                    'name' => $product->name,
                    'description' => $product->keywords,
                    'description_seo' => $product->keywords,
                    'keyword_seo' => $product->keywords,
                    'title_seo' => $product->title,
                    'content' => $product->noi_dung,
                    'product_id' => $product->id_product,
                    'language' => 'vi',
                ];
                $key = DB::table('tbl_key_old')->where([['theloai', 2], ['id', $product->id_product]])->first();
                if ($key) {
                    $keys[] = [
                        'slug' => $key->id_key,
                        'type' => 4,
                        'language' => 'vi',
                        'key_id' => $product->id_product,
                    ];
                }
                $product_for_category[] = ['product_id' => $product->id_product, 'category_id' => $product->id_catpd];
            }
            // CategoryProduct::insert($dataCategoryProduct);
            // CategoryProductTranslation::insert($dataCategoryProductTranlations);
            // Product::insert($dataProduct);
            // ProductTranslation::insert($dataProductTranlations);
            // ProductForCategory::insert($product_for_category);
            // dd($keys);
            Key::insert($keys);
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            DB::rollback();
        }
    }

    public function handleSupplier()
    {
        DB::beginTransaction();

        try {
            DB::commit();
            $suppliers = DB::table('tbl_hangsx_old')->get();
            $dataSupplier = [];
            $dataSupplierTranslations = [];
            foreach ($suppliers as $supplier) {
                $dataSupplier[] = [
                    'id' => $supplier->id_catct,
                    'order' => 0,
                    'active' => 1,
                    'admin_id' => 2,
                ];
                $dataSupplierTranslations[] = [
                    'name' => $supplier->name,
                    'supplier_id' => $supplier->id_catct,
                    'language' => 'vi',
                ];
            }
            Supplier::insert($dataSupplier);
            SupplierTranslation::insert($dataSupplierTranslations);
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            DB::rollback();
        }
    }

    public function handleAttribute()
    {
        DB::beginTransaction();

        try {
            DB::commit();
            $categories_filter = DB::table('tbl_cat_fill_old')->get();
            $categories_childs_filter = DB::table('tbl_list_fill_old')->get();
            $prices = DB::table('tbl_price_old')->get();
            $dataCategoryFilter = [];
            $dataCategoryFilterTranslations = [];
            // $id_price = 157;
            // $dataCategoryFilter = [[
            //     'id' => $id_price,
            //     'active' => 1,
            //     'hot' => 0,
            //     'admin_id' => 2,
            //     'parent_id' => 0,
            // ]];
            // $dataCategoryFilterTranslations = [[
            //     'name' => 'Giá tiền',
            //     'value' => '',
            //     'attribute_id' => $id_price,
            //     'language' => 'vi'
            // ]];
            // foreach ($prices as $price) {
            //     ++$id_price;
            //     $dataCategoryFilter[] = [
            //         'id' => $id_price,
            //         'active' => 1,
            //         'hot' => 0,
            //         'admin_id' => 2,
            //         'parent_id' => 157,
            //     ];
            //     $dataCategoryFilterTranslations[] = [
            //         'name' => $price->name,
            //         'value' => $price->giatu . '-' . $price->giaden,
            //         'attribute_id' => $id_price,
            //         'language' => 'vi'
            //     ];
            // }
            foreach ($categories_filter as $category) {
                $dataCategoryFilter[] = [
                    'id' => $category->id_catct,
                    'active' => 1,
                    'hot' => 0,
                    'admin_id' => 2,
                    'parent_id' => 0,
                ];
                $dataCategoryFilterTranslations[] = [
                    'name' => $category->name,
                    'attribute_id' => $category->id_catct,
                    'language' => 'vi'
                ];
            }
            foreach ($categories_childs_filter as $category) {
                $dataCategoryFilter[] = [
                    'id' => $category->id_catct,
                    'active' => 1,
                    'hot' => 0,
                    'admin_id' => 2,
                    'parent_id' => $category->id_cat_fill,
                ];
                $dataCategoryFilterTranslations[] = [
                    'name' => $category->name,
                    'attribute_id' => $category->id_catct,
                    'language' => 'vi'
                ];
            }
            Attribute::insert($dataCategoryFilter);
            AttributeTranslation::insert($dataCategoryFilterTranslations);
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            DB::rollback();
        }
    }
}
