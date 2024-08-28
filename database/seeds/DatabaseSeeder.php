<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(
           // AdminSeeder::class,
           // PermissionSeeder::class,
          //  RoleSeeder::class,
           PermissionRoleSeeder::class,
           // RoleAminSeeder::class,
        );
    }
}
class PermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            0 =>  [
                "id" => 1,
                "name" => "Dịch vụ",
                "description" => "Dịch vụ",
                "parent_id" => 0,
                "key_code" => null,

            ],
            1 =>  [
                "id" => 2,
                "name" => "list",
                "description" => "list",
                "parent_id" => 1,
                "key_code" => "category_product_list",

            ],
            2 =>  [
                "id" => 3,
                "name" => "add",
                "description" => "add",
                "parent_id" => 1,
                "key_code" => "category_product_add",

            ],
            3 =>  [
                "id" => 4,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 1,
                "key_code" => "category_product_edit",

            ],
            4 =>  [
                "id" => 5,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 1,
                "key_code" => "category_product_delete",

            ],
            5 =>  [
                "id" => 6,
                "name" => "Hình ảnh",
                "description" => "Hình ảnh",
                "parent_id" => 0,
                "key_code" => null,

            ],
            6 =>  [
                "id" =>  7,
                "name" => "list",
                "description" => "list",
                "parent_id" => 6,
                "key_code" => "slider_list",

            ],
            7 =>  [
                "id" => 8,
                "name" => "add",
                "description" => "add",
                "parent_id" => 6,
                "key_code" => "slider_add",

            ],
            8 =>  [
                "id" => 9,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 6,
                "key_code" => "slider_edit",

            ],
            9 =>  [
                "id" => 10,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 6,
                "key_code" => "slider_delete",

            ],
            10 =>  [
                "id" => 11,
                "name" => "menu",
                "description" => "menu",
                "parent_id" => 0,
                "key_code" => null,

            ],
            11 =>  [
                "id" => 12,
                "name" => "list",
                "description" => "list",
                "parent_id" => 11,
                "key_code" => "menu_list",

            ],
            12 =>  [
                "id" => 13,
                "name" => "add",
                "description" => "add",
                "parent_id" => 11,
                "key_code" => "menu_add",

            ],
            13 =>  [
                "id" => 14,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 11,
                "key_code" => "menu_edit",

            ],
            14 =>  [
                "id" => 15,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 11,
                "key_code" => "menu_delete",

            ],
            15 =>  [
                "id" => 16,
                "name" => "Bài viết dịch vụ",
                "description" => "Bài viết dịch vụ",
                "parent_id" => 0,
                "key_code" => null,

            ],
            16 =>  [
                "id" => 17,
                "name" => "list",
                "description" => "list",
                "parent_id" => 16,
                "key_code" => "product_list",

            ],
            17 =>  [
                "id" => 18,
                "name" => "add",
                "description" => "add",
                "parent_id" => 16,
                "key_code" => "product_add",

            ],
            18 =>  [
                "id" => 19,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 16,
                "key_code" => "product_edit",

            ],
            19 =>  [
                "id" => 20,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 16,
                "key_code" => "product_delete",

            ],
            20 =>  [
                "id" => 21,
                "name" => "Hệ thống",
                "description" => "Hệ thống",
                "parent_id" => 0,
                "key_code" => null,

            ],
            21 =>  [
                "id" => 22,
                "name" => "list",
                "description" => "list",
                "parent_id" => 21,
                "key_code" => "setting_list",

            ],
            22 =>  [
                "id" => 23,
                "name" => "add",
                "description" => "add",
                "parent_id" => 21,
                "key_code" => "setting_add",

            ],
            23 =>  [
                "id" => 24,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 21,
                "key_code" => "setting_edit",

            ],
            24 =>  [
                "id" => 25,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 21,
                "key_code" => "setting_delete",

            ],
            25 =>  [
                "id" => 26,
                "name" => "Tài khoản",
                "description" => "Tài khoản",
                "parent_id" => 0,
                "key_code" => null,

            ],
            26 =>  [
                "id" => 27,
                "name" => "list",
                "description" => "list",
                "parent_id" => 26,
                "key_code" => "admin_user_list",

            ],
            27 =>  [
                "id" => 28,
                "name" => "add",
                "description" => "add",
                "parent_id" => 26,
                "key_code" => "admin_user_add",

            ],
            28 =>  [
                "id" => 29,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 26,
                "key_code" => "admin_user_edit",

            ],
            29 =>  [
                "id" => 30,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 26,
                "key_code" => "admin_user_delete",

            ],
            30 =>  [
                "id" => 31,
                "name" => "Vai trò",
                "description" => "Vai trò",
                "parent_id" => 0,
                "key_code" => null,

            ],
            31 =>  [
                "id" => 32,
                "name" => "list",
                "description" => "list",
                "parent_id" => 31,
                "key_code" => "role_list",

            ],
            32 =>  [
                "id" => 33,
                "name" => "add",
                "description" => "add",
                "parent_id" => 31,
                "key_code" => "role_add",

            ],
            33 =>  [
                "id" => 34,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 31,
                "key_code" => "role_edit",

            ],
            34 =>  [
                "id" => 35,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 31,
                "key_code" => "role_delete",

            ],
            35 =>  [
                "id" => 36,
                "name" => "Danh sách quyền",
                "description" => "Danh sách quyền",
                "parent_id" => 0,
                "key_code" => null,

            ],
            36 =>  [
                "id" => 37,
                "name" => "list",
                "description" => "list",
                "parent_id" => 36,
                "key_code" => "permission_list",

            ],
            37 =>  [
                "id" => 38,
                "name" => "add",
                "description" => "add",
                "parent_id" => 36,
                "key_code" => "permission_add",

            ],
            38 =>  [
                "id" => 39,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 36,
                "key_code" => "permission_edit",

            ],
            39 =>  [
                "id" => 40,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 36,
                "key_code" => "permission_delete",

            ],
            40 =>  [
                "id" => 41,
                "name" => "Bài viết tin tức",
                "description" => "Bài viết tin tức",
                "parent_id" => 0,
                "key_code" => null,

            ],
            41 =>  [
                "id" => 42,
                "name" => "list",
                "description" => "list",
                "parent_id" => 41,
                "key_code" => "post_list",

            ],
            42 =>  [
                "id" => 43,
                "name" => "add",
                "description" => "add",
                "parent_id" => 41,
                "key_code" => "post_add",

            ],
            43 =>  [
                "id" => 44,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 41,
                "key_code" => "post_edit",

            ],
            44 =>  [
                "id" => 45,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 41,
                "key_code" => "post_delete",

            ],
            45 =>  [
                "id" => 46,
                "name" => "Tin tức",
                "description" => "Tin tức",
                "parent_id" => 0,
                "key_code" => null,

            ],
            46 =>  [
                "id" => 47,
                "name" => "list",
                "description" => "list",
                "parent_id" => 46,
                "key_code" => "category_post_list",

            ],
            47 =>  [
                "id" => 48,
                "name" => "add",
                "description" => "add",
                "parent_id" => 46,
                "key_code" => "category_post_add",

            ],
            48 =>  [
                "id" => 49,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 46,
                "key_code" => "category_post_edit",

            ],
            49 =>  [
                "id" => 50,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 46,
                "key_code" => "category_post_delete",

            ],
            50 =>  [
                "id" => 59,
                "name" => "list",
                "description" => "list",
                "parent_id" => 58,
                "key_code" => "admin_user_frontend_list",

            ],
            51 =>  [
                "id" => 60,
                "name" => "add",
                "description" => "add",
                "parent_id" => 58,
                "key_code" => "admin_user_frontend_add",

            ],
            52 =>  [
                "id" => 61,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 58,
                "key_code" => "admin_user_frontend_edit",

            ],
            53 =>  [
                "id" => 62,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 58,
                "key_code" => "admin_user_frontend_delete",

            ],
            54 =>  [
                "id" => 64,
                "name" => "list",
                "description" => "list",
                "parent_id" => 63,
                "key_code" => "pay_list",

            ],
            55 =>  [
                "id" => 65,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 63,
                "key_code" => "pay_edit",

            ],
            56 =>  [
                "id" => 66,
                "name" => "pay-update-draw-point",
                "description" => "pay-update-draw-point",
                "parent_id" => 63,
                "key_code" => "pay_update_draw_point",

            ],
            57 =>  [
                "id" => 67,
                "name" => "active",
                "description" => "active",
                "parent_id" => 58,
                "key_code" => "admin_user_frontend_active",

            ],
            58 =>  [
                "id" => 68,
                "name" => "transfer-point",
                "description" => "transfer-point",
                "parent_id" => 58,
                "key_code" => "admin_user_frontend_transfer_point",

            ],
            59 =>  [
                "id" => 70,
                "name" => "list",
                "description" => "list",
                "parent_id" => 69,
                "key_code" => "bank_list",

            ],
            60 =>  [
                "id" => 71,
                "name" => "add",
                "description" => "add",
                "parent_id" => 69,
                "key_code" => "bank_add",

            ],
            61 =>  [
                "id" => 72,
                "name" => "edit",
                "description" => "edit",
                "parent_id" => 69,
                "key_code" => "bank_edit",

            ],
            62 =>  [
                "id" => 73,
                "name" => "delete",
                "description" => "delete",
                "parent_id" => 69,
                "key_code" => "bank_delete",

            ],
            63 =>  [
                "id" => 75,
                "name" => "list",
                "description" => "Danh sách xuất nhâp kho",
                "parent_id" => 74,
                "key_code" => "store_list",

            ],
            64 =>  [
                "id" => 76,
                "name" => "input",
                "description" => "Nhập kho",
                "parent_id" => 74,
                "key_code" => "store_input",

            ],
            65 =>  [
                "id" => 78,
                "name" => "export excel",
                "description" => "Xuất file excel danh sách các yêu cầu rút điểm",
                "parent_id" => 63,
                "key_code" => "pay_export_excel",

            ],
        ];
        // $this->call(UserSeeder::class);
        foreach ($data as $item) {
            DB::table('permissions')->insert($item);
        }
    }
}
class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'phanvantan724957@gmail.com',
            'password' => Hash::make('1234567890'),
        ]);
    }
}
class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Admin',
            'description' => 'Quản trị hệ thống',
        ]);
    }
}
class RoleAminSeeder extends Seeder
{
    public function run()
    {
        DB::table('role_admins')->insert([
            'id' => 1,
            'admin_id' => 1,
            'role_id' => 1,

        ]);
    }
}
class PermissionRoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            7, 8, 9, 10,
            12, 13, 14, 15,
            17, 18, 19, 20,
            22, 23, 24, 25,
            27, 28, 29, 30,
            32, 33, 34, 35,
            37, 38, 39, 40,
            42, 43, 44, 45
        ];
        foreach ($data as  $value) {
            DB::table('permission_roles')->insert([
                'permission_id' => $value,
                'role_id' => 1,
            ]);
        }

    }
}
