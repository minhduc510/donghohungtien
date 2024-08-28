<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Admin;
use App\Models\User;
class PermissionGateAndPolicyAccess
{

    public function setGateAndPolicyAccess()
    {
        $this->defineGateCategoryProduct();
        $this->defineGateCategoryPost();
        $this->defineGateSlider();
        $this->defineGateMenu();
        $this->defineGateBank();
        $this->defineGateProduct();
        $this->defineGatePost();
        $this->defineGateSetting();
        $this->defineGateUser();
        $this->defineGateUserFrontend();
        $this->defineGateRole();
        $this->defineGatePermission();
        $this->defineGatePay();
        $this->defineGateStore();
        $this->defineGateTransaction();
    }
    public function defineGateCategoryProduct()
    {
        // module category_product

        Gate::define('category-product-list', 'App\Policies\Admins\AdminCategoryProductPolicy@list');
        Gate::define('category-product-add', 'App\Policies\Admins\AdminCategoryProductPolicy@add');
        Gate::define('category-product-edit', 'App\Policies\Admins\AdminCategoryProductPolicy@edit');
        Gate::define('category-product-delete', 'App\Policies\Admins\AdminCategoryProductPolicy@delete');
    }
    public function defineGateCategoryPost()
    {
        // module category_post
        Gate::define('category-post-list', 'App\Policies\Admins\AdminCategoryPostPolicy@list');
        Gate::define('category-post-add',  'App\Policies\Admins\AdminCategoryPostPolicy@add');
        Gate::define('category-post-edit',  'App\Policies\Admins\AdminCategoryPostPolicy@edit');
        Gate::define('category-post-delete', 'App\Policies\Admins\AdminCategoryPostPolicy@delete');
    }
    public function defineGateSlider()
    {
        // module slider
        Gate::define('slider-list', 'App\Policies\Admins\AdminSliderPolicy@list');
        Gate::define('slider-add', 'App\Policies\Admins\AdminSliderPolicy@add');
        Gate::define('slider-edit', 'App\Policies\Admins\AdminSliderPolicy@edit');
        Gate::define('slider-delete', 'App\Policies\Admins\AdminSliderPolicy@delete');
    }
    public function defineGateMenu()
    {
        // module menu
        Gate::define('menu-list', 'App\Policies\Admins\AdminMenuPolicy@list');
        Gate::define('menu-add', 'App\Policies\Admins\AdminMenuPolicy@add');
        Gate::define('menu-edit', 'App\Policies\Admins\AdminMenuPolicy@edit');
        Gate::define('menu-delete', 'App\Policies\Admins\AdminMenuPolicy@delete');
    }

    public function defineGateProduct()
    {
        // module product
        Gate::define('product-list', 'App\Policies\Admins\AdminProductPolicy@list');
        Gate::define('product-add', 'App\Policies\Admins\AdminProductPolicy@add');
        Gate::define('product-edit', 'App\Policies\Admins\AdminProductPolicy@edit');
        Gate::define('product-delete', 'App\Policies\Admins\AdminProductPolicy@delete');
    }
    public function defineGatePost()
    {
        // module post
        Gate::define('post-list', 'App\Policies\Admins\AdminPostPolicy@list');
        Gate::define('post-add', 'App\Policies\Admins\AdminPostPolicy@add');
        Gate::define('post-edit', 'App\Policies\Admins\AdminPostPolicy@edit');
        Gate::define('post-delete', 'App\Policies\Admins\AdminPostPolicy@delete');
    }

    public function defineGateSetting()
    {
        // module setting
        Gate::define('setting-list', 'App\Policies\Admins\AdminSettingPolicy@list');
        Gate::define('setting-add', 'App\Policies\Admins\AdminSettingPolicy@add');
        Gate::define('setting-edit', 'App\Policies\Admins\AdminSettingPolicy@edit');
        Gate::define('setting-delete', 'App\Policies\Admins\AdminSettingPolicy@delete');
    }

    public function defineGateUser()
    {
        // module user
        Gate::define('admin-user-list', 'App\Policies\Admins\AdminUserPolicy@list');
        Gate::define('admin-user-add', 'App\Policies\Admins\AdminUserPolicy@add');
        Gate::define('admin-user-edit', 'App\Policies\Admins\AdminUserPolicy@edit');
        Gate::define('admin-user-delete', 'App\Policies\Admins\AdminUserPolicy@delete');
    }

    public function defineGateUserFrontend()
    {
        // module user
        Gate::define('admin-user_frontend-list', 'App\Policies\Admins\AdminUserFrontendPolicy@list');
        Gate::define('admin-user_frontend-add', 'App\Policies\Admins\AdminUserFrontendPolicy@add');
        Gate::define('admin-user_frontend-edit', 'App\Policies\Admins\AdminUserFrontendPolicy@edit');
        Gate::define('admin-user_frontend-delete', 'App\Policies\Admins\AdminUserFrontendPolicy@delete');
        Gate::define('admin-user_frontend-active', 'App\Policies\Admins\AdminUserFrontendPolicy@active');
        Gate::define('admin-user_frontend-transfer-point', 'App\Policies\Admins\AdminUserFrontendPolicy@transferPoint');
    }

    public function defineGateRole()
    {
        // module role
        Gate::define('role-list', 'App\Policies\Admins\AdminRolePolicy@list');
        Gate::define('role-add', 'App\Policies\Admins\AdminRolePolicy@add');
        Gate::define('role-edit', 'App\Policies\Admins\AdminRolePolicy@edit');
        Gate::define('role-delete', 'App\Policies\Admins\AdminRolePolicy@delete');
    }

    public function defineGatePermission()
    {
        // module permission
        Gate::define('permission-list', 'App\Policies\Admins\AdminPermissionPolicy@list');
        Gate::define('permission-add', 'App\Policies\Admins\AdminPermissionPolicy@add');
        Gate::define('permission-edit', 'App\Policies\Admins\AdminPermissionPolicy@edit');
        Gate::define('permission-delete', 'App\Policies\Admins\AdminPermissionPolicy@delete');
    }

    public function defineGatePay()
    {
        // module permission
        Gate::define('pay-list', 'App\Policies\Admins\AdminPayPolicy@list');
        Gate::define('pay-add', 'App\Policies\Admins\AdminPayPolicy@add');
        Gate::define('pay-edit', 'App\Policies\Admins\AdminPayPolicy@edit');
        Gate::define('pay-update-draw-point', 'App\Policies\Admins\AdminPayPolicy@payUpdateDrawPoint');
        Gate::define('pay-delete', 'App\Policies\Admins\AdminPayPolicy@delete');
        Gate::define('pay-export-excel', 'App\Policies\Admins\AdminPayPolicy@exportExcel');
    }

    public function defineGateBank()
    {
        // module menu

        Gate::define('bank-list', 'App\Policies\Admins\AdminBankPolicy@list');
        Gate::define('bank-add', 'App\Policies\Admins\AdminBankPolicy@add');
        Gate::define('bank-edit', 'App\Policies\Admins\AdminBankPolicy@edit');
        Gate::define('bank-delete', 'App\Policies\Admins\AdminBankPolicy@delete');
    }
    public function defineGateStore()
    {
        // module menu

        Gate::define('store-list', 'App\Policies\Admins\AdminStorePolicy@list');
        Gate::define('store-input', 'App\Policies\Admins\AdminStorePolicy@input');
        Gate::define('store-output', 'App\Policies\Admins\AdminStorePolicy@output');
        Gate::define('store-delete', 'App\Policies\Admins\AdminStorePolicy@delete');
    }
    public function defineGateTransaction()
    {

        Gate::define('transaction-list', 'App\Policies\Admins\AdminTransactionPolicy@list');
        Gate::define('transaction-status', 'App\Policies\Admins\AdminTransactionPolicy@status');
        Gate::define('transaction-delete', 'App\Policies\Admins\AdminTransactionPolicy@delete');
    }
}
