<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cartId');
            $table->unsignedBigInteger('clothesId');
            $table->integer('quantity');

            // $table->timestamps();

            $table->foreign('cartId')->references('id')->on('carts');
            $table->foreign('clothesId')->references('id')->on('clothes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_details');
    }
}
