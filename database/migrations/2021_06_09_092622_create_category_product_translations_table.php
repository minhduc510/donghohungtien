<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_product_translations', function (Blueprint $table) {
            $table->id();
            $table->string("name",255);
            $table->string("slug",255);
            $table->text("description")->nullable();
            $table->string("description_seo",255)->nullable();
            $table->string("keyword_seo",255)->nullable();
            $table->string("title_seo",255)->nullable();
            $table->longText("content")->nullable();
            $table->bigInteger('category_id')->unsigned();
            $table->string("language",255);
            $table->foreign('category_id')->references('id')->on('category_products')->onDelete('cascade');
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
        Schema::dropIfExists('category_product_translations');
    }
}
