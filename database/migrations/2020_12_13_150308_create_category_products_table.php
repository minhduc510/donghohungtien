<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_products', function (Blueprint $table) {
            $table->bigIncrements("id");
          //  $table->string("name",255);
          //  $table->string("slug",255);
        //   $table->string("description",255)->nullable();
        //   $table->longText("content")->nullable();
        //   $table->string("description_seo",255)->nullable();
        //   $table->string("title_seo",255)->nullable();
            $table->string("icon_path",255)->nullable();
            $table->string("avatar_path",255)->nullable();
            $table->tinyInteger("active")->default(1);
            $table->bigInteger('order')->nullable()->default(0);
            $table->bigInteger('parent_id')->unsigned()->default(0);
            $table->bigInteger('admin_id')->unsigned();
            //  $table->foreign('user_id')->references('id')->on('admins')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_products');
    }
}
