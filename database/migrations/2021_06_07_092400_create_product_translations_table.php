<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_translations', function (Blueprint $table) {
            $table->id();
            $table->string("name",255);
            $table->string("slug",255);
            $table->text("description")->nullable();
            // thông số sản phẩm
            $table->string("model",255)->nullable();
            $table->string("tinhtrang",255)->nullable();
            $table->string("baohanh",255)->nullable();
            $table->string("xuatsu",255)->nullable();
            // content
            $table->longText("content")->nullable();
            $table->longText("content2")->nullable();
            $table->longText("content3")->nullable();
            $table->longText("content4")->nullable();
            // seo
            $table->string("description_seo",255)->nullable();
            $table->string("keyword_seo",255)->nullable();
            $table->string("title_seo",255)->nullable();

            $table->bigInteger('product_id')->unsigned();
            $table->string("language",255);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::table('product_translations', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('product_translations');
    }
}
