<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('historyId');
            $table->unsignedBigInteger('clothesId');
            $table->integer('quantity');

            // $table->timestamps();

            $table->foreign('historyId')->references('id')->on('histories');
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
        Schema::dropIfExists('history_details');
    }
}
