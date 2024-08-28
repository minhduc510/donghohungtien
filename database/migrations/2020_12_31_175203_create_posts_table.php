<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements("id");
           // $table->string("name",255);
          //  $table->string("slug",255);
          //  $table->text("description")->nullable();
          //  $table->longText("content")->nullable();
            $table->string("avatar_path",255)->nullable();
         //   $table->string("description_seo",255)->nullable();
         //   $table->string("title_seo",255)->nullable();
            $table->integer("view")->default(0)->nullable();
            $table->tinyInteger("hot")->default(0);
            $table->tinyInteger("active")->default(1);
            $table->bigInteger('order')->nullable()->default(0);
            $table->bigInteger("category_id")->unsigned();
          //  $table->foreign('a_category_id')->references('id')->on('categoriesarticles')->onDelete('cascade');
            $table->bigInteger("admin_id")->unsigned();
          //  $table->foreign('a_author_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
