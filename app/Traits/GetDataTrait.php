<?php

namespace App\Traits;

use App\Models\Post;
use App\Models\PostCate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use App\Models\CategoryPost;
use App\Models\CategoryProduct;
use App\Helper\CartHelper;
use App\Helper\CompareHelper;
use App\Models\Supplier;
use App\Models\Attribute;
use App\Models\Contact;
use App\Models\Product;
use  Illuminate\Support\Facades\App;

/**
 *
 */
trait GetDataTrait
{
    public function getDataHeaderTrait($setting)
    {
        $cart = new CartHelper();
        $compare = new CompareHelper();
        $categoryProduct = new CategoryProduct();
        $categoryPost = new CategoryPost();
        $categoryPost = new CategoryPost();
        $supplier = new Supplier();
        $attribute = new Attribute();
        $lang = App::getLocale();
        $totalQuantity =  $cart->getTotalQuantity();
        $totalCompareQuantity =  $compare->getTotalQuantity();

        $header['totalPrice'] = $cart->getTotalPrice();

        $header['seo_home'] = $setting->find(2);

        $header['data-cart'] = $cart->cartItems;
        $header['totalQuantity'] = $totalQuantity;
        $header['totalCompareQuantity'] = $totalCompareQuantity;

        $header['logo'] = $setting->where('active', 1)->find(48);
        $header['hotline'] = $setting->where('active', 1)->find(70);
        $header['shop_glasses'] = $setting->where('active', 1)->find(339);
        $header['social_media'] = $setting->where('active', 1)->find(212);
        $header['image_menu'] = $setting->where('active', 1)->find(341);

        $header['categories_product'] = $categoryProduct->where('active', 1)->find(276);

        $header['introduce'] = $categoryPost->where('active', 1)->find(166);

        $list_product_id_donghodeotay = \App\Models\ProductForCategory::where(
            'category_id',
            327,
        )
            ->pluck('product_id')
            ->toArray();
        $list_supplier_id_donghodeotay = array_unique(
            \App\Models\Product::whereIn('id', $list_product_id_donghodeotay)
                ->where('active', 1)
                ->pluck('supplier_id')
                ->toArray(),
        );

        $header['brands'] = $supplier->where('active', 1)->whereIn('id', $list_supplier_id_donghodeotay)->orderBy('order', 'asc')->get();

        $header['prices'] = $attribute->where('active', 1)->find(157);
        $header['attributes_hot'] = $attribute->where([['active', 1], ['hot', 1]])->get();

        $header['product_men'] = $attribute->where('active', 1)->find(1732);
        $header['product_women'] = $attribute->where('active', 1)->find(1733);
        $header['tinTuc'] = $categoryPost->where('active', 1)->find(159);
        $header['address'] = $setting->where('active', 1)->find(349);

        return  $header;
    }

    public function getDataFooterTrait($setting)
    {
        $post = new Post();
        $contact = new Contact();
        $supplier = new Supplier();
        $categoryPost = new CategoryPost();
        $categoryProduct = new CategoryProduct();
        $footer = [];

        $footer['map'] = $setting->where('active', 1)->find(175);
        $footer['links'] = $setting->where('active', 1)->find(94);
        $footer['brands'] = $supplier->where('active', 1)->get();
        $footer['fanpage_facebook'] = $setting->where('active', 1)->find(333);
        $footer['contact_info'] = $setting->where('active', 1)->find(93);
        $footer['ministry_trade'] = $setting->where('active', 1)->find(338);
        $footer['introduce_buy'] = $categoryPost->where('active', 1)->find(175);
        $footer['email'] = $setting->where('active', 1)->find(250);
        $footer['social_media'] = $setting->where('active', 1)->find(114);

        return  $footer;
    }
    public function getDataSidebarTrait($categoryPost, $categoryProduct)
    {
        $sidebar = [];
        $supplier = new Supplier();
        $attribute = new Attribute();
        $setting = new Setting();
        $product = new Product();

        return  $sidebar;
    }
}
