<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shopping_cart', function (Blueprint $table) {
            $table->increments('shopping_cart_id');
            $table->string('shopping_cart_name');
            // $table->integer('cus_id');
            $table->string('shopping_cart_address');
            $table->string('shopping_cart_phone');
            $table->string('shopping_cart_email');
            $table->string('shopping_cart_notes');
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
        Schema::dropIfExists('tbl_shopping_cart');
    }
};
