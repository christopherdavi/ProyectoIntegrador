<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_products')->unsigned();
            $table->foreign('id_products')->references('id')->on('products')->onUpdate('cascade');
            $table->unsignedBigInteger('id_shippings')->unsigned();
            $table->foreign('id_shippings')->references('id')->on('shippings')->onUpdate('cascade');
            $table->integer('TotalPayment');
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
        Schema::dropIfExists('carts');
    }
}
