<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements("id");
           // $table->string("name",255);
           // $table->string("slug",255);
           $table->bigInteger('order')->nullable()->default(0);
            $table->bigInteger("parent_id")->unsigned();
            $table->bigInteger("admin_id")->unsigned();
            $table->tinyInteger("active")->default(1);
            $table->string('avatar_path',255)->nullable();
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
        Schema::dropIfExists('menus');
    }
}
