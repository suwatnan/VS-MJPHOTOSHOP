<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrintphotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printphotos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('printphoto')->nullable();
            $table->integer('status')->nullable();
            $table->integer('userID')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('printphotos');
    }
}
