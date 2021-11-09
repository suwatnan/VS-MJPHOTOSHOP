<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSizeimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizeimages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('sizeimageID')->nullable();
            $table->string('size')->nullable();
            $table->float('price')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sizeimages');
    }
}
