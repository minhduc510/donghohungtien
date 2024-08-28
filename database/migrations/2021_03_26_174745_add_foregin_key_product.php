<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeginKeyProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("products",function($table){
            $table->foreign('category_id')->references('id')->on('category_products')->onDelete('cascade');
           // $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table("products",function($table){
            $table->dropForeign(['category_id']);
          //  $table->dropForeign(['admin_id']);
        });
    }
}
