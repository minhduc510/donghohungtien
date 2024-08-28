<?php

// tạo link
function makeLink($type, $id = null, $slug = null, $request = [])
{
    $route = "";
    switch ($type) {
        case 'category_products':
            if ($slug) {
                $route = route("product.productByCategory", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        case 'checkKey':
            if ($slug) {
                $route = route("checkKey", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        // case 'category_posts':
        //     if ($slug) {
        //         $route = route("post.postByCategory", ["slug" => $slug]);
        //     } else {
        //         $route = "#";
        //     }
        //     break;
        case 'post':
            if ($slug) {
                $route = route("post.detail", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        case 'post_all':
            
            $route = route("post.index");
            break;
        // case 'product':
        //     if ($slug) {
        //         $route = route("product.detail", ["slug" => $slug]);
        //     } else {
        //         $route = "#";
        //     }
        //     break;
        case 'product_all':
            $route = route("product.index");
            break;

        case 'home':
            $route = route("home.index");
            break;
        case 'about-us':
            $route = route("about-us");
            break;
        case 'bao-gia':
            $route = route("bao-gia");
            break;
        case 'tuyen-dung':
            $route = route("tuyen-dung");
            break;
        case 'autocomplete-ajax':
            $route = route("admin.autocomplete.ajax");
            break;
        case 'tuyen-dung-detail':
            if ($slug) {
                $route = route("tuyendung_link", ['slug' => $slug]);
            } else {
                $route = "#";
            }

            break;
        case 'categoryByManufacturer':
            if ($slug) {
                $route = route("categoryByManufacturer", ['slug' => $slug, 'id' => $id]);
            } else {
                $route = "#";
            }

            break;
        case 'contact':
            $route = route("contact.index");
            break;
        case 'search':
            $route = route("home.search", $request);
            break;
        default:
            $route = route("home.index");
            break;
    }
    return $route;
}

function makeLinkById($type, $id = null)
{
    $route = "";
    switch ($type) {
        case 'category_products':
            $slug = optional(App\Models\CategoryProduct::find($id))->slug;
            if ($slug) {
                $route = route("checkKey", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        case 'category_posts':
            $slug = optional(App\Models\CategoryPost::find($id))->slug;

            if ($slug) {
                $route = route("checkKey", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        case 'post':
            $slug = optional(App\Models\Post::find($id))->slug;
            if ($slug) {
                $route = route("checkKey", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        case 'product':
            $slug = optional(App\Models\Product::find($id))->slug;
            if ($slug) {
                $route = route("checkKey", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        default:
            $route = route("home.index");
            break;
    }
    return $route;
}

function makeLinkPost($type, $id = null, $slug = null, $request = [])
{
    $route = "";
    switch ($type) {
        case 'index':
            $route = route("post.index");
            break;
        case 'category':
            if ($slug) {
                $route = route("checkKey", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        case 'post':
            if ($slug) {
                $route = route("checkKey", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        default:
            $route = route("home.index");
            break;
    }
    return $route;
}

function makeLinkToLanguage($type, $id = null, $slug = null, $lang = 'vi', $request = [])
{
    $route = "";
    if ($lang == 'vi') {
        $lang = "";
    } else {
        $lang = '.' . $lang;
    }
    switch ($type) {
        case 'about-us':
            $route = route("about-us" . $lang);
            break;
        case 'manufacturer':
            $route = route("manufacturer" . $lang);
            break;
        case 'camnhan':
            $route = route("camnhan" . $lang);
            break;
        case 'product-my-manufacturer':
            if ($slug) {
                $route = route("productByManufacturer" . $lang, ['slug' => $slug]);
            } else {
                $route = "#";
            }
            break;
        case 'categoryByManufacturer':
            if ($slug) {
                $route = route("categoryByManufacturer" . $lang, ['slug' => $slug, 'id' => $id]);
            } else {
                $route = "#";
            }
            break;
        case 'tuyen-dung':
            $route = route("tuyen-dung" . $lang);
            break;
        case 'tuyen-dung-detail':
            if ($slug) {
                $route = route("tuyendung_link" . $lang, ['slug' => $slug]);
            } else {
                $route = "#";
            }
            break;
        case 'search-dai-ly':
            $route = route("search-daily" . $lang,$request);
            break;
        case 'contact':
            $route = route("contact.index" . $lang);
            break;
        default:
            $route = route("home.index");
            break;
    }
    return $route;
}

function menuRecusive($model, $id, $result = array(), $i = 0)
{
    //  global $result;
    $i++;
    $data = $model->where('active', 1)->select(['id'])->orderby('order')->orderByDesc('created_at')->find($id);
    $item = $data->toArray();

    $childs =  $data->childs()->where('active', 1)->select(['id'])->orderby('order')->orderByDesc('created_at')->get();
    foreach ($childs as $child) {
        //  $res  = $child->setAppends(['slug'])->toArray();

        $res =  menuRecusive($model, $child->id, []);
        // dd( $res );
        $item['childs'][] = $res;

    }
    //  dd($result);
    // array_push($result, $item);
    return $item;
}

// quy đổi tiền sang điểm
function moneyToPoint($money)
{
    $money = (int)$money;
    return $money / config('point.pointToMoney');
}
function pointToMoney($point)
{
    return (float)$point * config('point.pointToMoney');
}
function makeCodeTransaction($transaction)
{
    $code = 'mgd-' . date('Y-m-d-h-s-m');
    //  dd($code);
    while ($transaction->where([
        'code' => $code,
    ])->exists()) {
        $code = 'mgd-' . date('Y-m-d-h-s-m') . rand(1, 1000);
    }
    return $code;
}

function checkRouteLanguage($slug, $data)
{
    if ($slug != $data->slug) {
        $name = Route::currentRouteName();
        return redirect()->route($name, ['slug' => $data->slug]);
    } else {
        return false;
    }
}
function checkRouteLanguage2($slug = null)
{

    $name = Route::currentRouteName();
    //  dd($name);
    $lang = App::getLocale();
    $langConfig = array_keys(config('languages.supported'));
    //  dd($langConfig);
    $langDefault = config('languages.default');
    //   dd($langDefault);

    // dd($lang!=$langDefault);
    $slice = '';
    $langCurrentOfRoute = '';
    foreach ($langConfig as $value) {
        if (Str::endsWith($name, '.' . $value)) {
            $slice = Str::before($name, '.' . $value);
            $langCurrentOfRoute = $value;
            break;
        }
    }
    if ($slice == '' && $langCurrentOfRoute == '') {
        $slice = $name;
        $langCurrentOfRoute = $langDefault;
    }
    if ($langCurrentOfRoute != $lang) {
        if ($lang == $langDefault) {

            return redirect()->route($slice, ['slug' => $slug]);
        } else {
            return redirect()->route($slice . '.' . $lang, ['slug' => $slug]);
        }
    } else {
        return false;
    }
}

function makePriceAfterVat($price){
    return $price*1.1;
}
