<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Artisan::call('storage:link');
//Artisan::call('cache:clear');

Route::get('test', function () {
    // $a = bcrypt('1234567890');
    // echo $a;
    $data = App\Models\District::find(1)->communes()->get();
    $countView = new \App\Helper\CountView();
    $model = new \App\Models\Product();
    $countView->countView($model, 'view', 'product', 5);
});

Route::group(
    [
        'prefix' => 'laravel-filemanager'
    ],
    function () {
        UniSharp\LaravelFilemanager\Lfm::routes();
    }
);
Route::get('/sitemap.xml', 'SitemapXmlController@index')->name('sitemap.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax'], function () {
    Route::group(['prefix' => 'address'], function () {
        Route::get('district', 'AddressController@getDistricts')->name('ajax.address.districts');
        Route::get('communes', 'AddressController@getCommunes')->name('ajax.address.communes');
    });
});
Route::post('/save-session-data', 'ShoppingCartController@saveData')->name('save.session.data');

// 'middleware' => ['auth', 'cartToggle']
Route::group(['prefix' => 'cart'], function () {
    Route::get('list', 'ShoppingCartController@list')->name('cart.list');
    Route::get('checkout', 'ShoppingCartController@step2')->name('cart.step2');
    Route::get('confirm', 'ShoppingCartController@step3')->name('cart.step3');
    Route::post('confirm', 'ShoppingCartController@step3')->name('cart.step3');
    Route::get('add/{id}', 'ShoppingCartController@add')->name('cart.add');
    Route::get('buy/{id}', 'ShoppingCartController@buy')->name('cart.buy');
    Route::get('remove/{id}', 'ShoppingCartController@remove')->name('cart.remove');
    Route::get('update/{id}', 'ShoppingCartController@update')->name('cart.update');
    Route::get('useDiscountCode', 'ShoppingCartController@useDiscountCode')->name('cart.useDiscountCode');
    Route::get('clear', 'ShoppingCartController@clear')->name('cart.clear');
    Route::get('updateListPayment', 'ShoppingCartController@updateListPayment')->name('cart.updateListPayment');
    Route::post('order', 'ShoppingCartController@postOrder')->name('cart.order.submit');
    Route::get('list-step-order', 'ShoppingCartController@listStepOrder')->name('cart.list-step');
    Route::get('order/sucess/{id}', 'ShoppingCartController@getOrderSuccess')->name('cart.order.sucess');
    Route::get('order/error', 'ShoppingCartController@getOrderError')->name('cart.order.error');
});

Route::get('/filter-products', 'ProductController@filterProducts')->name('filterProducts');
Route::get('/chuyenActive', 'ProductController@chuyenActive')->name('chuyenActive');
Route::get('/doi-tac-dai-ly', 'HomeController@doiTacDaiLy')->name('doiTacDaiLy');
Route::post('/sort-items', 'ProductController@sortItems')->name('sort.items');

Route::post('/update-option-price', 'ProductController@UpdateOptionPrice')->name('UpdateOptionPrice');

Auth::routes(['verify' => false]);

Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

Route::get('/logout', 'Auth\LoginController@loggedOut')->name('home.logout');

// compare product
Route::group(['prefix' => 'compare'], function () {
    Route::get('/', 'CompareController@list')->name('compare.list');
    Route::get('add/{id}', 'CompareController@add')->name('compare.add');
    Route::get('add-redirect/{id}', 'CompareController@addAndRedirect')->name('compare.addAndRedirect');
    Route::get('remove/{id}', 'CompareController@remove')->name('compare.remove');
    Route::get('update/{id}', 'CompareController@update')->name('compare.update');
    Route::get('clear', 'CompareController@clear')->name('compare.clear');
});

Route::group(['prefix' => 'san-pham'], function () {
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('{slug}', 'ProductController@detail')->name('product.detail');
});


Route::get('/danh-muc/{slug}', 'ProductController@productByCategory')->name('product.productByCategory');
Route::get('product-sale', 'ProductController@sale')->name('product.sale');

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('/', 'ProfileController@index')->name('profile.index');
    Route::get('/history', 'ProfileController@history')->name('profile.history');
    Route::get('/transaction-detail/{id}', "ProfileController@loadTransactionDetail")->name("profile.transaction.detail");
    Route::get('/list-rose', 'ProfileController@listRose')->name('profile.listRose');
    Route::get('/list-member', 'ProfileController@listMember')->name('profile.listMember');
    Route::get('/create-member', 'ProfileController@createMember')->name('profile.createMember');
    Route::post('/store-member', 'ProfileController@storeMember')->name('profile.storeMember');
    Route::post('/draw_point', 'ProfileController@drawPoint')->name('profile.drawPoint');
    Route::get('/ranking', 'ProfileController@ranking')->name('profile.ranking');
    Route::get('/discount-code', 'ProfileController@discountCode')->name('profile.discountCode');
    Route::get('/address', 'ProfileController@address')->name('profile.address');
    Route::get('/edit-info', 'ProfileController@editInfo')->name('profile.editInfo');
    Route::get('/edit-info2', 'ProfileController@editInfo2')->name('profile.editInfo2');
    Route::post('/update-info/{id}', 'ProfileController@updateInfo')->name('profile.updateInfo')->middleware('profileOwnUser');

    Route::get('/change-password', 'ProfileController@changePassword')->name('profile.changePassword');
    Route::post('/change-password', 'ProfileController@changeStorePassword')->name('profile.changeStorePassword');
});

Route::group(['prefix' => 'tin-tuc-1.html'], function () {
    Route::get('/', 'PostController@index')->name('post.index');
    Route::get('{slug}', 'PostController@detail')->name('post.detail');
});
Route::get('tag/{slug}', 'PostController@tag')->name('post.tag');

Route::get('/danh-muc-tin-tuc/{slug}', 'PostController@postByCategory')->name('post.postByCategory');
Route::get('/huong-dan-su-dung', 'HomeController@userManual')->name('userManual');
Route::get('/huong-dan-su-dung/{slug}', 'HomeController@userManualDetail')->name('userManualDetail');
//Logout
// auth


Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/change-language/{language}', 'LanguageController@index')->name('language.index');

// landing-page
Route::get('/sofa-phong-khach', 'HomeController@langdingPage')->name('langdingPage');

// giới thiệu
Route::get('/gioi-thieu', 'HomeController@aboutUs')->name('about-us');
Route::get('/about-us', 'HomeController@aboutUs')->name('about-us.en');
Route::get('/설명하다', 'HomeController@aboutUs')->name('about-us.ko');
Route::get('/sale-off.html', 'HomeController@saleoff')->name('sale-off');

// thông tin liên hệ
Route::post('contact/store-ajax', 'ContactController@storeAjax')->name('contact.storeAjax');
Route::post('contact/store-ajax1', 'ContactController@storeAjax1')->name('contact.storeAjax1');
Route::post('contact/store-ajax2', 'ContactController@storeAjax2')->name('contact.storeAjax2');
Route::get('/lien-he.html', 'ContactController@index')->name('contact.index');
Route::get('/contact', 'ContactController@index')->name('contact.index.en');
Route::get('/접촉', 'ContactController@index')->name('contact.index.ko');

Route::get('/tim-cua-hang', 'ContactController@findStore')->name('contact.findStore');


// tìm kiếm đại lý

Route::get('/tim-kiem-dai-ly', 'HomeController@search_daily')->name('search-daily');
Route::get('/search-agent', 'HomeController@search_daily')->name('search-daily.en');
Route::get('/에이전트-검색', 'HomeController@search_daily')->name('search-daily.ko');


Route::get('load-price', 'ProductController@loadPrice')->name('loadPrice');


Route::group(['prefix' => 'comment'], function () {
    Route::post('/{type}/{id}', 'CommentController@store')->name('comment.store');
});
Route::post('/comment', 'CommentController@comment')->name('comment');

Route::group(['prefix' => 'search'], function () {
    Route::get('/', 'HomeController@search')->name('home.search');
});
Route::get('/san-pham-khuyen-mai', 'ProductController@productSale')->name('san-pham-khuyen-mai');
// Đánh giá sản phẩm
Route::get('admin/login', "Auth\AdminLoginController@showLoginForm")->name("admin.login");
Route::get('/login', "Auth\LoginController@login")->name("login");
Route::post('logout', "Auth\LoginController@logout")->name("logout");
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', "AdminHomeController@index")->name("admin.index");
});
Route::post('product/rating/{id}', 'ProductController@rating')->name('product.rating');
Route::post('product/comment/{id}', 'ProductController@comment')->name('product.comment');

Route::get('/404.html', 'HomeController@notFound')->name('not-found');

Route::get('{slug}', 'KeyController@checkKey')->name('checkKey');


Route::get('/load-address/{id}', "ProfileController@loadAddress")->name("profile.load.default.adddress");
Route::get('/destroy-address/{id}', "ProfileController@destroyAddress")->name("profile.destroy.address");
Route::get('/form-edit-address/{id}', "ProfileController@editAddress")->name("profile.form.edit.adddress");
Route::post('profile/store-address', 'ProfileController@storeAddress')->name('profile.storeAddress');
Route::post('profile/update-address/{id}', 'ProfileController@updateAddress')->name('profile.updateAddress');

Route::get('/cart-load-address/{id}', "ProfileController@cartLoadAddress")->name("profile.load.cart.adddress");
