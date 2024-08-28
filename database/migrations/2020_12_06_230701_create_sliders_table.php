<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements("id");
           // $table->string("name",255);
          //  $table->string("slug",255);
          //  $table->string("description",255)->nullable();
            $table->string("image_path",255)->nullable();
            $table->bigInteger('order')->nullable()->default(0);
            $table->bigInteger("admin_id")->unsigned();
            $table->tinyInteger("active")->default(1);
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
        Schema::dropIfExists('sliders');
    }
}
