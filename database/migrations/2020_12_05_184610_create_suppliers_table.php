<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {

            $table->bigIncrements("id");
          //  $table->string("name",255);
            $table->string("email",255)->nullable();
            $table->string("phone",255)->nullable();
            $table->string("fax",255)->nullable();
            $table->string("website",255)->nullable();
            $table->bigInteger('order')->nullable();
            $table->string("logo_path",255)->nullable();
            $table->tinyInteger("active")->default(1);
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
        Schema::dropIfExists('suppliers');
    }
}
