<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeginKeyOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("orders",function($table){
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
           // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::table("orders",function($table){
            $table->dropForeign(['transaction_id']);
           // $table->dropForeign(['product_id']);
        });
    }
}
