<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements("id");
          //  $table->string("name",255);
          //  $table->text("value")->nullable();
         //   $table->string("slug",255)->nullable();
         //   $table->text("description")->nullable();
            $table->tinyInteger("active")->default(1);
            $table->bigInteger("parent_id")->unsigned();
            $table->string("image_path",255)->nullable();
            $table->bigInteger('order')->nullable()->default(0);
            $table->bigInteger("admin_id")->unsigned();

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
        Schema::dropIfExists('settings');
    }
}
