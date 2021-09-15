<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('address1');
            $table->string('address2');
            $table->string('province');
            $table->string('postalCode');
            $table->string('contactName');
            $table->string('phoneNumber');
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
        Schema::dropIfExists('address');
    }
}
