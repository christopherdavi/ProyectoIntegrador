<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_payments', function (Blueprint $table) {
            $table->id();
          $table->string('description');
          $table->unsignedBigInteger('id_coin_types')->unsigned();
          $table->foreign('id_coin_types')->references('id')->on('coin_types')->onUpdate('cascade');
          $table->unsignedBigInteger('id_billing_addresses')->unsigned();
          $table->foreign('id_billing_addresses')->references('id')->on('billing_addresses')->onUpdate('cascade');
          $table->unsignedBigInteger('id_cards')->unsigned();
          $table->foreign('id_cards')->references('id')->on('cards')->onUpdate('cascade');
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
        Schema::dropIfExists('card_payments');
    }
}
