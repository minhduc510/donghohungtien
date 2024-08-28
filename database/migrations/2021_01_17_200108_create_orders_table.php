<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->tinyInteger("quantity");
            $table->string("name",255);
            $table->float("new_price",10,2);
            $table->float("old_price",10,2)->nullable();
            $table->tinyInteger("sale")->nullable();
            $table->dateTime("warranty")->nullable();
            $table->string("avatar_path",255)->nullable();
            $table->bigInteger("transaction_id")->unsigned();
            $table->bigInteger("product_id")->unsigned();
            // $table->integer("customer_id")->unsigned();
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
        Schema::dropIfExists('orders');
    }
}
