<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sub_categories')->constrained('sub_categories')->onUpdate('cascade')->onDelete('cascade');                       
            $table->string('code');
            $table->string('codePostal');
            $table->integer('stock');
            $table->string('description');
            $table->string('image');            
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
        Schema::dropIfExists('articules');
    }
}
