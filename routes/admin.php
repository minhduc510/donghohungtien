<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/login', "Auth\AdminLoginController@showLoginForm")->name("admin.login");
Route::post('admin/logout', "Auth\AdminLoginController@logout")->name("admin.logout");
Route::post('admin/login', "Auth\AdminLoginController@login")->name("admin.login.submit");

Route::get('admin/password/confirm', 'Auth\AdminConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
Route::get('admin/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');





Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    // Route::get('/', function () {
    //     return view("admin.master.main");
    // });

    Route::get('/', "AdminHomeController@index")->name("admin.index");

    // Route::get('login', "AdminController@getLoginAdmin")->name("admin.getLoginAdmin");
    // Route::post('login', "AdminController@postLoginAdmin")->name("admin.postLoginAdmin");

    Route::group(['prefix' => 'ajax'], function () {
    });

    Route::get('/load-order/{table}/{id}', "AdminHomeController@loadOrderVeryModel")->name("admin.loadOrderVeryModel");
    //  Route::get('/lang-cr', "AdminCategoryProductController@langCr");
    Route::group(['prefix' => 'categoryproduct'], function () {
        Route::get('/', "AdminCategoryProductController@index")->name("admin.categoryproduct.index")->middleware(['can:category-product-list']);
        Route::get('/create', "AdminCategoryProductController@create")->name("admin.categoryproduct.create")->middleware('can:category-product-add');
        Route::post('/store', "AdminCategoryProductController@store")->name("admin.categoryproduct.store")->middleware('can:category-product-add');
        Route::get('/edit/{id}', "AdminCategoryProductController@edit")->name("admin.categoryproduct.edit")->middleware('can:category-product-edit');
        Route::post('/update/{id}', "AdminCategoryProductController@update")->name("admin.categoryproduct.update")->middleware('can:category-product-edit');
        Route::get('/destroy/{id}', "AdminCategoryProductController@destroy")->name("admin.categoryproduct.destroy")->middleware('can:category-product-delete');
        Route::post('/export/excel/database', "AdminCategoryProductController@excelExportDatabase")->name("admin.categoryproduct.export.excel.database");
        Route::post('/import/excel/database', "AdminCategoryProductController@excelImportDatabase")->name("admin.categoryproduct.import.excel.database");
        Route::get('/delete-avatar-path/{id}', "AdminCategoryProductController@destroyCategoryProductAvatar")->name("admin.categoryproduct.delete_avatar_path");
        Route::get('/delete-icon-path/{id}', "AdminCategoryProductController@destroyCategoryProductIcon")->name("admin.categoryproduct.delete_icon_path");

        Route::get('/update-category-product-hot/{id}', "AdminCategoryProductController@loadHot")->name("admin.categoryproduct.load.hot")->middleware('can:category-product-edit');
        Route::get('/update-category-product-active/{id}', "AdminCategoryProductController@loadActive")->name("admin.categoryproduct.load.active")->middleware('can:category-product-edit');
    });
    Route::group(['prefix' => 'categorypost'], function () {
        Route::get('/', "AdminCategoryPostController@index")->name("admin.categorypost.index")->middleware('can:category-post-list');
        Route::get('/create', "AdminCategoryPostController@create")->name("admin.categorypost.create")->middleware('can:category-post-add');
        Route::post('/store', "AdminCategoryPostController@store")->name("admin.categorypost.store")->middleware('can:category-post-add');
        Route::get('/edit/{id}', "AdminCategoryPostController@edit")->name("admin.categorypost.edit")->middleware('can:category-post-edit');
        Route::post('/update/{id}', "AdminCategoryPostController@update")->name("admin.categorypost.update")->middleware('can:category-post-edit');
        Route::get('/destroy/{id}', "AdminCategoryPostController@destroy")->name("admin.categorypost.destroy")->middleware('can:category-post-delete');
        Route::post('/export/excel/database', "AdminCategoryPostController@excelExportDatabase")->name("admin.categorypost.export.excel.database");
        Route::post('/import/excel/database', "AdminCategoryPostController@excelImportDatabase")->name("admin.categorypost.import.excel.database");
        Route::get('/delete-avatar-path/{id}', "AdminCategoryPostController@destroyCategoryPostAvatar")->name("admin.categorypost.delete_avatar_path");
        Route::get('/delete-icon-path/{id}', "AdminCategoryPostController@destroyCategoryPostIcon")->name("admin.categorypost.delete_icon_path");
        Route::get('/update-category-post-hot/{id}', "AdminCategoryPostController@loadHot")->name("admin.categorypost.load.hot")->middleware('can:category-post-edit');
        Route::get('/update-category-post-active/{id}', "AdminCategoryPostController@loadActive")->name("admin.categorypost.load.active")->middleware('can:category-post-edit');
    });
    Route::group(['prefix' => 'menu'], function () {
        Route::get('/', "AdminMenuController@index")->name("admin.menu.index")->middleware('can:menu-list');
        Route::get('/create', "AdminMenuController@create")->name("admin.menu.create")->middleware('can:menu-add');
        Route::post('/store', "AdminMenuController@store")->name("admin.menu.store")->middleware('can:menu-add');
        Route::get('/edit/{id}', "AdminMenuController@edit")->name("admin.menu.edit")->middleware('can:menu-edit');
        Route::post('/update/{id}', "AdminMenuController@update")->name("admin.menu.update")->middleware('can:menu-edit');
        Route::get('/destroy/{id}', "AdminMenuController@destroy")->name("admin.menu.destroy")->middleware('can:menu-delete');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', "AdminProductController@index")->name("admin.product.index")->middleware('can:product-list');
        Route::get('/create', "AdminProductController@create")->name("admin.product.create")->middleware('can:product-add');

        Route::get('/callAjaxAttributes', "AdminProductController@callAjaxAttributes")->name("admin.product.callAjaxAttributes");

        Route::post('/store', "AdminProductController@store")->name("admin.product.store")->middleware('can:product-add');
        Route::get('/edit/{id}', "AdminProductController@edit")->name("admin.product.edit")->middleware('can:product-edit');
        Route::post('/update/{id}', "AdminProductController@update")->name("admin.product.update")->middleware('can:product-edit');
        Route::get('/destroy/{id}', "AdminProductController@destroy")->name("admin.product.destroy")->middleware('can:product-delete');
        Route::get('/update-active/{id}', "AdminProductController@loadActive")->name("admin.product.load.active")->middleware('can:product-edit');
        Route::get('/update-hot/{id}', "AdminProductController@loadHot")->name("admin.product.load.hot")->middleware('can:product-edit');
        Route::get('/update-promotional/{id}', "AdminProductController@loadPromotional")->name("admin.product.load.promotional")->middleware('can:product-edit');
        Route::get('/delete-image/{id}', "AdminProductController@destroyProductImage")->name("admin.product.destroy-image")->middleware('can:product-edit');
        Route::post('/export/excel/database', "AdminProductController@excelExportDatabase")->name("admin.product.export.excel.database");
        Route::post('/import/excel/database', "AdminProductController@excelImportDatabase")->name("admin.product.import.excel.database");
        Route::get('/delete-avatar-path/{id}', "AdminProductController@destroyProductAvatar")->name("admin.product.delete_avatar_path")->middleware('can:product-edit');
        Route::get('/delete-avatar-path2/{id}', "AdminProductController@destroyProductAvatar2")->name("admin.product.delete_avatar_path2")->middleware('can:product-edit');

        Route::get('load-option-product', "AdminProductController@loadOptionProduct")->name("admin.product.loadOptionProduct");
        Route::get('/delete-option-product/{id}', "AdminProductController@destroyOptionProduct")->name("admin.product.destroyOptionProduct");

        //Tab sản phẩm
        Route::get('/list-product-tab/{product_id}', "AdminProductController@listProductTab")->name("admin.product.tab")->middleware('can:product-list');

        Route::get('/add-product-tab/{product_id}', "AdminProductController@addProductTab")->name("admin.product.tab.create")->middleware('can:product-add');

        Route::post('/tab-store', "AdminProductController@tabStore")->name("admin.product.tab.store")->middleware('can:product-add');

        Route::get('/edit-product-tab/{id}', "AdminProductController@editProductTab")->name("admin.product.tab.edit")->middleware('can:product-edit');

        Route::post('/update-product-tab/{id}', "AdminProductController@updateProductTab")->name("admin.product.tab.update")->middleware('can:product-edit');

        Route::get('/delete-product-tab/{id}', "AdminProductController@destroyTab")->name("admin.product.destroyTab");

        //Parameter sản phẩm
        Route::get('/list-product-parameter/{product_id}', "AdminProductController@listProductParameter")->name("admin.product.parameter")->middleware('can:product-list');

        Route::get('/add-product-parameter/{product_id}', "AdminProductController@addProductParameter")->name("admin.product.parameter.create")->middleware('can:product-add');

        Route::post('/parameter-store', "AdminProductController@parameterStore")->name("admin.product.parameter.store")->middleware('can:product-add');

        Route::get('/edit-product-parameter/{id}', "AdminProductController@editProductParameter")->name("admin.product.parameter.edit")->middleware('can:product-edit');

        Route::post('/update-product-parameter/{id}', "AdminProductController@updateProductParameter")->name("admin.product.parameter.update")->middleware('can:product-edit');

        Route::get('/delete-product-parameter/{id}', "AdminProductController@destroyParameter")->name("admin.product.destroyParameter");
        //Sao chep
        Route::get('/coppy/{id}', "AdminProductController@coppy")->name("admin.product.coppy");
        Route::post('/update-coppy/{id}', "AdminProductController@updateCoppy")->name("admin.product.update_coppy");
        //Option sản phẩm
        Route::get('/list-product-option/{product_id}', "AdminProductController@listProductOption")->name("admin.product.option")->middleware('can:product-list');

        Route::get('/add-product-option/{product_id}', "AdminProductController@addProductOption")->name("admin.product.option.create")->middleware('can:product-add');

        Route::post('/option-store', "AdminProductController@optionStore")->name("admin.product.option.store")->middleware('can:product-add');

        Route::get('/edit-product-option/{id}', "AdminProductController@editProductOption")->name("admin.product.option.edit")->middleware('can:product-edit');

        Route::post('/update-product-option/{id}', "AdminProductController@updateProductOption")->name("admin.product.option.update")->middleware('can:product-edit');

        Route::get('/delete-product-option/{id}', "AdminProductController@destroyOption")->name("admin.product.destroyOption");

        Route::get('/delete-option-image/{id}', "AdminProductController@destroyProductOptionImage")->name("admin.product.option.destroy-image")->middleware('can:product-edit');

        //Đánh giá sản phẩm
        Route::get('/product-star', "AdminProductController@indexStar")->name("admin.product.indexStar");
        Route::get('/delete-product-star/{id}', "AdminProductController@destroyStar")->name("admin.product.destroyStar");
        Route::get('/edit-product-star/{id}', "AdminProductController@editStar")->name("admin.product.editStar");
        Route::post('/update-product-star/{id}', "AdminProductController@updateStar")->name("admin.product.updateStar");
        Route::get('/active-product-star/{id}', "AdminProductController@activeStar")->name("admin.product.activeStar");
        Route::group(['prefix' => 'productcomment'], function () {
            Route::get('/', "AdminProductCommentController@index")->name("admin.productcomment.index");
            Route::get('/update-hot/{id}', "AdminProductCommentController@loadHot")->name("admin.productcomment.load.hot");

            Route::get('/destroy/{id}', "AdminProductCommentController@destroy")->name("admin.productcomment.destroy");
        });
        Route::post('upload-file-new', "AdminProductController@uploadFileNew")->name('admin.product.uploadFileNew');
        Route::post('upload-file-new2', "AdminProductController@uploadFileNew2")->name('admin.product.uploadFileNew2');

        Route::get('/delete-all', "AdminProductController@deleteAll")->name("admin.product.delete.all")->middleware('can:product-delete');
        Route::get('/search-product', "AdminProductController@searchProduct")->name("admin.product.search");
        Route::get('/get-attribute', "AdminProductController@getAttribute")->name("admin.product.get-attribute");
    });

    Route::group(['prefix' => 'attribute'], function () {
        Route::get('/', "AdminAttributeController@index")->name("admin.attribute.index")->middleware('can:product-list');
        Route::get('/create', "AdminAttributeController@create")->name("admin.attribute.create")->middleware('can:product-add');
        Route::post('/store', "AdminAttributeController@store")->name("admin.attribute.store")->middleware('can:product-add');
        Route::get('/edit/{id}', "AdminAttributeController@edit")->name("admin.attribute.edit")->middleware('can:product-edit');
        Route::post('/update/{id}', "AdminAttributeController@update")->name("admin.attribute.update")->middleware('can:product-edit');
        Route::get('/destroy/{id}', "AdminAttributeController@destroy")->name("admin.attribute.destroy")->middleware('can:product-delete');


        Route::get('/update-attribute-hot/{id}', "AdminAttributeController@loadHot")->name("admin.attribute.load.hot");
        Route::get('/update-attribute-active/{id}', "AdminAttributeController@loadActive")->name("admin.attribute.load.active");
    });
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/', "AdminSupplierController@index")->name("admin.supplier.index")->middleware('can:product-list');
        Route::get('/create', "AdminSupplierController@create")->name("admin.supplier.create")->middleware('can:product-add');
        Route::post('/store', "AdminSupplierController@store")->name("admin.supplier.store")->middleware('can:product-add');
        Route::get('/edit/{id}', "AdminSupplierController@edit")->name("admin.supplier.edit")->middleware('can:product-edit');
        Route::post('/update/{id}', "AdminSupplierController@update")->name("admin.supplier.update")->middleware('can:product-edit');
        Route::get('/destroy/{id}', "AdminSupplierController@destroy")->name("admin.supplier.destroy")->middleware('can:product-delete');
        Route::get('/update-active/{id}', "AdminSupplierController@loadActive")->name("admin.supplier.load.active")->middleware('can:product-edit');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('/', "AdminPostController@index")->name("admin.post.index")->middleware('can:post-list');
        Route::get('/create', "AdminPostController@create")->name("admin.post.create")->middleware('can:post-add');
        Route::post('/store', "AdminPostController@store")->name("admin.post.store")->middleware('can:post-add');
        Route::get('/edit/{id}', "AdminPostController@edit")->name("admin.post.edit")->middleware('can:post-edit');
        Route::post('/update/{id}', "AdminPostController@update")->name("admin.post.update")->middleware('can:post-edit');
        Route::get('/coppy/{id}', "AdminPostController@coppy")->name("admin.post.coppy");
        Route::post('/update-coppy/{id}', "AdminPostController@updateCoppy")->name("admin.post.update_coppy");
        Route::get('/destroy/{id}', "AdminPostController@destroy")->name("admin.post.destroy")->middleware('can:post-delete');
        Route::get('/update-active/{id}', "AdminPostController@loadActive")->name("admin.post.load.active")->middleware('can:post-edit');
        Route::get('/update-hot/{id}', "AdminPostController@loadHot")->name("admin.post.load.hot")->middleware('can:post-edit');
        Route::get('/delete-avatar-path/{id}', "AdminPostController@destroyPostAvatar")->name("admin.post.delete_avatar_path")->middleware('can:post-edit');

        Route::post('/export/excel/database', "AdminPostController@excelExportDatabase")->name("admin.post.export.excel.database");
        Route::post('/import/excel/database', "AdminPostController@excelImportDatabase")->name("admin.post.import.excel.database");

        Route::get('/delete-post-all', "AdminPostController@deleteAll")->name("admin.post.delete.all")->middleware('can:post-delete');

        // đoạn văn
        Route::get('load-paragraph-post', "AdminPostController@loadParagraphPost")->name("admin.post.loadParagraphPost");
        Route::get('/load-edit-paragraph-post/{id}', "AdminPostController@loadEditParagraphPost")->name("admin.post.loadEditParagraphPost");
        Route::get('/load-create-paragraph-post/{id}', "AdminPostController@loadCreateParagraphPost")->name("admin.post.loadCreateParagraphPost");
        Route::get('/load-parent-paragraph-post/{id}', "AdminPostController@loadParentParagraphPost")->name("admin.post.loadParentParagraphPost");
        Route::post('/store-paragraph-post/{id}', "AdminPostController@storeParagraphPost")->name("admin.post.storeParagraphPost");
        Route::post('/update-paragraph-post/{id}', "AdminPostController@updateParagraphPost")->name("admin.post.updateParagraphPost");
        Route::get('/delete-paragraph-post/{id}', "AdminPostController@destroyParagraphPost")->name("admin.post.destroyParagraphPost");
    });
    Route::group(['prefix' => 'categorygalaxy'], function () {
        Route::get('/', "AdminCategoryGalaxyController@index")->name("admin.categorygalaxy.index");
        Route::get('/create', "AdminCategoryGalaxyController@create")->name("admin.categorygalaxy.create");
        Route::post('/store', "AdminCategoryGalaxyController@store")->name("admin.categorygalaxy.store");
        Route::get('/edit/{id}', "AdminCategoryGalaxyController@edit")->name("admin.categorygalaxy.edit");
        Route::post('/update/{id}', "AdminCategoryGalaxyController@update")->name("admin.categorygalaxy.update");
        Route::get('/destroy/{id}', "AdminCategoryGalaxyController@destroy")->name("admin.categorygalaxy.destroy");


        Route::get('/update-category-galaxy-hot/{id}', "AdminCategoryGalaxyController@loadHot")->name("admin.categorygalaxy.load.hot");
        Route::get('/update-category-galaxy-active/{id}', "AdminCategoryGalaxyController@loadActive")->name("admin.categorygalaxy.load.active");
    });

    Route::group(['prefix' => 'galaxy'], function () {
        Route::get('/anh', "AdminGalaxyController@index")->name("admin.galaxy.index");
        Route::get('/video', "AdminGalaxyController@video")->name("admin.galaxy.video");
        Route::get('/create', "AdminGalaxyController@create")->name("admin.galaxy.create");
        Route::get('/create1', "AdminGalaxyController@create1")->name("admin.galaxy.create1");
        Route::post('/store', "AdminGalaxyController@store")->name("admin.galaxy.store");
        Route::get('/edit/{id}', "AdminGalaxyController@edit")->name("admin.galaxy.edit");
        Route::get('/edit1/{id}', "AdminGalaxyController@edit1")->name("admin.galaxy.edit1");
        Route::post('/update/{id}', "AdminGalaxyController@update")->name("admin.galaxy.update");
        Route::get('/destroy/{id}', "AdminGalaxyController@destroy")->name("admin.galaxy.destroy");
        Route::get('/update-active/{id}', "AdminGalaxyController@loadActive")->name("admin.galaxy.load.active");
        Route::get('/update-hot/{id}', "AdminGalaxyController@loadHot")->name("admin.galaxy.load.hot");

        Route::get('/delete-avatar-path/{id}', "AdminGalaxyController@destroyGalaxyAvatar")->name("admin.galaxy.delete_avatar_path");

        Route::get('/delete-image/{id}', "AdminGalaxyController@destroyGalaxyImage")->name("admin.galaxy.destroy-image");
    });
    Route::group(['prefix' => 'categorylanding'], function () {
        Route::get('/', "AdminCategoryLandingController@index")->name("admin.categorylanding.index");
        Route::get('/create', "AdminCategoryLandingController@create")->name("admin.categorylanding.create");
        Route::post('/store', "AdminCategoryLandingController@store")->name("admin.categorylanding.store");
        Route::get('/edit/{id}', "AdminCategoryLandingController@edit")->name("admin.categorylanding.edit");
        Route::post('/update/{id}', "AdminCategoryLandingController@update")->name("admin.categorylanding.update");
        Route::get('/destroy/{id}', "AdminCategoryLandingController@destroy")->name("admin.categorylanding.destroy");
        Route::post('/export/excel/database', "AdminCategoryLandingController@excelExportDatabase")->name("admin.categorypost.export.excel.database");
        Route::post('/import/excel/database', "AdminCategoryPostController@excelImportDatabase")->name("admin.categorypost.import.excel.database");

        Route::get('/update-category-post-hot/{id}', "AdminCategoryLandingController@loadHot")->name("admin.categorylanding.load.hot");
    });
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', "AdminSliderController@index")->name("admin.slider.index")->middleware('can:slider-list');
        Route::get('/create', "AdminSliderController@create")->name("admin.slider.create")->middleware('can:slider-add');
        Route::post('/store', "AdminSliderController@store")->name("admin.slider.store")->middleware('can:slider-add');
        Route::get('/edit/{id}', "AdminSliderController@edit")->name("admin.slider.edit")->middleware('can:slider-edit');
        Route::post('/update/{id}', "AdminSliderController@update")->name("admin.slider.update")->middleware('can:slider-edit');
        Route::get('/destroy/{id}', "AdminSliderController@destroy")->name("admin.slider.destroy")->middleware('can:slider-delete');
        Route::get('/update-active/{id}', "AdminSliderController@loadActive")->name("admin.slider.load.active")->middleware('can:slider-edit');
        Route::get('/delete-image-path/{id}', "AdminSliderController@destroySliderImage")->name("admin.slider.delete_image_path");
        Route::get('/delete-image-path-2/{id}', "AdminSliderController@destroySliderImage2")->name("admin.slider.delete_image_path2");
    });
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', "AdminSettingController@index")->name("admin.setting.index")->middleware('can:setting-list');
        Route::get('/create', "AdminSettingController@create")->name("admin.setting.create")->middleware('can:setting-add');
        Route::post('/store', "AdminSettingController@store")->name("admin.setting.store")->middleware('can:setting-add');
        Route::get('/edit/{id}', "AdminSettingController@edit")->name("admin.setting.edit")->middleware('can:setting-edit');
        Route::post('/update/{id}', "AdminSettingController@update")->name("admin.setting.update")->middleware('can:setting-edit');
        Route::get('/destroy/{id}', "AdminSettingController@destroy")->name("admin.setting.destroy")->middleware('can:setting-delete');
        Route::get('/delete-image-path/{id}', "AdminSettingController@destroySettingImage")->name("admin.setting.delete_image_path");
        Route::get('/delete-icon-path/{id}', "AdminSettingController@destroySettingIcon")->name("admin.setting.delete_icon_path");
        Route::get('/update-active/{id}', "AdminSettingController@loadActive")->name("admin.setting.load.active")->middleware('can:setting-edit');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', "AdminUserController@index")->name("admin.user.index")->middleware('can:admin-user-list');
        Route::get('/create', "AdminUserController@create")->name("admin.user.create")->middleware('can:admin-user-add');
        Route::post('/store', "AdminUserController@store")->name("admin.user.store")->middleware('can:admin-user-add');
        Route::get('/edit/{id}', "AdminUserController@edit")->name("admin.user.edit")->middleware('can:admin-user-edit');
        Route::post('/update/{id}', "AdminUserController@update")->name("admin.user.update")->middleware('can:admin-user-edit');
        Route::get('/destroy/{id}', "AdminUserController@destroy")->name("admin.user.destroy")->middleware('can:admin-user-delete');
    });

    Route::get('comment-post', "AdminPostCommentController@index")->name("admin.post.comment.index");
    Route::get('/active-comment/{id}', "AdminPostCommentController@activeComment")->name("admin.post.active");
    Route::get('/unactive-comment/{id}', "AdminPostCommentController@unactiveComment")->name("admin.post.unactive");
    Route::get('/delete-comment/{id}', "AdminPostCommentController@deleteComment")->name("admin.post.delete");

    Route::group(['prefix' => 'user-frontend'], function () {
        Route::get('/', "AdminUserFrontendController@index")->name("admin.user_frontend.index")->middleware('can:admin-user_frontend-list');
        //  Route::get('/list-no-active', "AdminUserFrontendController@listNoActive")->name("admin.user_frontend.listNoActive")->middleware('can:admin-user_frontend-list');
        Route::get('/detail/{id}', "AdminUserFrontendController@detail")->name("admin.user_frontend.detail")->middleware('can:admin-user_frontend-list');
        Route::get('/create', "AdminUserFrontendController@create")->name("admin.user_frontend.create")->middleware('can:admin-user_frontend-add');
        Route::post('/store', "AdminUserFrontendController@store")->name("admin.user_frontend.store")->middleware('can:admin-user_frontend-add');
        Route::get('/update-active/{id}', "AdminUserFrontendController@loadActive")->name("admin.user_frontend.load.active")->middleware('can:admin-user_frontend-active');
        Route::get('/update-active-key/{id}', "AdminUserFrontendController@loadActiveKey")->name("admin.user_frontend.load.active-key")->middleware('can:admin-user_frontend-active');
        Route::get('/load-detail/{id}', "AdminUserFrontendController@loadUserDetail")->name("admin.user_frontend.loadUserDetail")->middleware('can:admin-user_frontend-list');
        Route::get('/transfer-point/{id}', "AdminUserFrontendController@transferPoint")->name("admin.user_frontend.transferPoint")->middleware('can:admin-user_frontend-transfer-point');
        Route::get('/transfer-point-between', "AdminUserFrontendController@transferPointBetweenXY")->name("admin.user_frontend.transferPointBetweenXY")->middleware('can:admin-user_frontend-transfer-point');
        Route::get('/transfer-point-random', "AdminUserFrontendController@transferPointRandom")->name("admin.user_frontend.transferPointRandom")->middleware('can:admin-user_frontend-transfer-point');
        Route::get('/edit/{id}', "AdminUserFrontendController@edit")->name("admin.user_frontend.edit")->middleware('can:admin-user_frontend-edit');
        Route::post('/update/{id}', "AdminUserFrontendController@update")->name("admin.user_frontend.update")->middleware('can:admin-user_frontend-edit');
        Route::get('/destroy/{id}', "AdminUserFrontendController@destroy")->name("admin.user_frontend.destroy")->middleware('can:admin-user_frontend-delete');
    });
    Route::group(['prefix' => 'pay'], function () {
        Route::get('/', "AdminPayController@index")->name("admin.pay.index")->middleware('can:pay-list');
        Route::get('/update-draw-point', "AdminPayController@updateDrawPoint")->name("admin.pay.updateDrawPoint")->middleware('can:pay-update-draw-point');
        Route::get('/update-draw-point-all', "AdminPayController@updateDrawPointAll")->name("admin.pay.updateDrawPointAll")->middleware('can:pay-update-draw-point');
        Route::post('/export/excel/database', "AdminPayController@excelExportDatabase")->name("admin.pay.export.excel.database")->middleware('can:pay-export-excel');
    });


    Route::group(['prefix' => 'role'], function () {
        Route::get('/', "AdminRoleController@index")->name("admin.role.index")->middleware('can:role-list');
        Route::get('/create', "AdminRoleController@create")->name("admin.role.create")->middleware('can:role-add');
        Route::post('/store', "AdminRoleController@store")->name("admin.role.store")->middleware('can:role-add');
        Route::get('/edit/{id}', "AdminRoleController@edit")->name("admin.role.edit")->middleware('can:role-edit');
        Route::post('/update/{id}', "AdminRoleController@update")->name("admin.role.update")->middleware('can:role-edit');
        Route::get('/destroy/{id}', "AdminRoleController@destroy")->name("admin.role.destroy")->middleware('can:role-delete');
    });
    Route::group(['prefix' => 'permission'], function () {
        Route::get('/', "AdminPermissionController@index")->name("admin.permission.index")->middleware('can:permission-list');
        Route::get('/create', "AdminPermissionController@create")->name("admin.permission.create")->middleware('can:permission-add');
        Route::post('/store', "AdminPermissionController@store")->name("admin.permission.store")->middleware('can:permission-add');
        Route::get('/edit/{id}', "AdminPermissionController@edit")->name("admin.permission.edit")->middleware('can:permission-edit');
        Route::post('/update/{id}', "AdminPermissionController@update")->name("admin.permission.update")->middleware('can:permission-edit');
        Route::get('/destroy/{id}', "AdminPermissionController@destroy")->name("admin.permission.destroy")->middleware('can:permission-delete');
    });


    Route::group(['prefix' => 'transaction'], function () {
        Route::get('status-next/{id}', "AdminTransactionController@loadNextStepStatus")->name("admin.transaction.loadNextStepStatus")->middleware('can:transaction-status');
        Route::get('/', "AdminTransactionController@index")->name("admin.transaction.index")->middleware('can:transaction-list');
        Route::get('/show/{id}', "AdminTransactionController@show")->name("admin.transaction.show")->middleware('can:transaction-list');
        Route::get('/destroy/{id}', "AdminTransactionController@destroy")->name("admin.transaction.destroy")->middleware('can:transaction-delete');
        Route::get('/update-thanhtoan/{id}', "AdminTransactionController@loadThanhtoan")->name("admin.product.load.thanhtoan")->middleware('can:transaction-list');
        Route::get('/transaction-detail/{id}', "AdminTransactionController@loadTransactionDetail")->name("admin.transaction.detail")->middleware('can:transaction-list');
        Route::get('/transaction-detail/export/pdf/{id}', "AdminTransactionController@exportPdfTransactionDetail")->name("admin.transaction.detail.export.pdf");

        Route::get('/discount', "AdminTransactionController@discount")->name("admin.discount.index")->middleware('can:transaction-list');
        Route::get('/create-discount', "AdminTransactionController@createDiscount")->name("admin.discount.create")->middleware('can:transaction-list');
        Route::post('/store-discount', "AdminTransactionController@storeDiscount")->name("admin.discount.store")->middleware('can:transaction-list');
        Route::get('/edit-discount/{id}', "AdminTransactionController@editDiscount")->name("admin.discount.edit")->middleware('can:transaction-list');
        Route::post('/update-discount/{id}', "AdminTransactionController@updateDiscount")->name("admin.discount.update")->middleware('can:transaction-list');
        Route::get('/destroy-discount/{id}', "AdminTransactionController@destroyDiscount")->name("admin.discount.destroy")->middleware('can:transaction-delete');
        Route::get('/edit-dis', "AdminTransactionController@editDis")->name("admin.discount.edit.dis")->middleware('can:transaction-list');
        Route::post('/update-dis/{id}', "AdminTransactionController@updateDis")->name("admin.discount.update.dis")->middleware('can:transaction-list');

        Route::get('/export/excel', "AdminTransactionController@excelExportDatabase")->name("admin.transaction.export.excel.database");
    });


    Route::group(['prefix' => 'contact'], function () {
        Route::get('status-next/{id}', "AdminContactController@loadNextStepStatus")->name("admin.contact.loadNextStepStatus");
        Route::get('/', "AdminContactController@index")->name("admin.contact.index");
        Route::get('/show/{id}', "AdminContactController@show")->name("admin.contact.show");
        Route::get('/destroy/{id}', "AdminContactController@destroy")->name("admin.contact.destroy");
        Route::get('/contact-detail/{id}', "AdminContactController@loadContactDetail")->name("admin.contact.detail");
        Route::get('/export/excel', "AdminContactController@excelExportDatabase")->name("admin.contact.export.excel.database");
    });

    Route::group(['prefix' => 'code'], function () {
        Route::get('/', "AdminCodeController@index")->name("admin.code.index");
        Route::get('/create', "AdminCodeController@create")->name("admin.code.create");
        Route::post('/store', "AdminCodeController@store")->name("admin.code.store");
        Route::get('/edit/{id}', "AdminCodeController@edit")->name("admin.code.edit");
        Route::post('/update/{id}', "AdminCodeController@update")->name("admin.code.update");
        Route::get('/destroy/{id}', "AdminCodeController@destroy")->name("admin.code.destroy");
        Route::get('/update-active/{id}', "AdminCodeController@loadActive")->name("admin.code.load.active");
    });
    Route::group(['prefix' => 'bank'], function () {
        Route::get('/', "AdminBankController@index")->name("admin.bank.index")->middleware('can:bank-list');
        Route::get('/create', "AdminBankController@create")->name("admin.bank.create")->middleware('can:bank-add');
        Route::post('/store', "AdminBankController@store")->name("admin.bank.store")->middleware('can:bank-add');
        Route::get('/edit/{id}', "AdminBankController@edit")->name("admin.bank.edit")->middleware('can:bank-edit');
        Route::post('/update/{id}', "AdminBankController@update")->name("admin.bank.update")->middleware('can:bank-edit');
        Route::get('/destroy/{id}', "AdminBankController@destroy")->name("admin.bank.destroy")->middleware('can:bank-delete');
    });
    Route::group(['prefix' => 'store'], function () {
        Route::get('/', "AdminStoreController@index")->name("admin.store.index")->middleware('can:store-list');
        Route::get('/create', "AdminStoreController@create")->name("admin.store.create")->middleware('can:store-input');
        Route::post('/store', "AdminStoreController@store")->name("admin.store.store")->middleware('can:store-input');
        Route::get('/edit/{id}', "AdminStoreController@edit")->name("admin.store.edit")->middleware('can:store-edit');
        Route::post('/update/{id}', "AdminStoreController@update")->name("admin.store.update")->middleware('can:store-edit');
        Route::get('/destroy/{id}', "AdminStoreController@destroy")->name("admin.store.destroy")->middleware('can:store-delete');
    });
    Route::post('/update-product-post', 'AdminProductController@updateProductPost')->name('update-product-post');
});
