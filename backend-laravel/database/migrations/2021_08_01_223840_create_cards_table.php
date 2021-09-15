<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('cardNumber');
            $table->string('ownerName');
            $table->string('lastNameOwner');
            $table->date('expirationDate');
            $table->date('yearExpiration');
            $table->string('securityCode');
            $table->unsignedBigInteger('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('cards');
    }
}
