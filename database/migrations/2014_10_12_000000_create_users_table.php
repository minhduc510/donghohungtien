<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string("phone",255)->nullable();
            $table->string("username",255);
            $table->string("address",255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger("active")->default(1);
            $table->bigInteger("order")->nullable();
            $table->tinyInteger("status")->default(1);

            $table->string("avatar_path",255)->nullable();

            $table->date("date_birth")->nullable();
            // hộ khẩu thường trú
            $table->string("hktt",255)->nullable();
            // chứng minh thư
            $table->string("cmt",255)->nullable();
            // số tài khoản
            $table->string("stk",255)->nullable();
            // chủ tài khoản
            $table->string("ctk",255)->nullable();
            // ngân hàng
            $table->bigInteger('bank_id')->unsigned()->nullable();
            // tên chi nhanh ngân hàng
            $table->string("bank_branch",255)->nullable();
            // giới tính
            $table->tinyInteger("sex")->nullable();

            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->bigInteger('parent_id2')->unsigned()->nullable();

            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
