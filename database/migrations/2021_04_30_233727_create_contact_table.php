<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string("phone",255)->nullable();
            $table->tinyInteger("active")->default(1);

            $table->tinyInteger("status")->default(1);
            $table->bigInteger("admin_id")->unsigned()->nullable();
            $table->bigInteger("user_id")->unsigned()->nullable();
            $table->bigInteger("city_id")->unsigned()->nullable();
            $table->bigInteger("district_id")->unsigned()->nullable();
            $table->bigInteger("commune_id")->unsigned()->nullable();
            $table->string("address_detail",255)->nullable();
            $table->text('content')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('contact');
    }
}
