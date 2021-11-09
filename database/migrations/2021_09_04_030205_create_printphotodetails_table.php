<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrintphotodetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printphotodetails', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('printphotodetailID')->nullable();
            $table->string('imageFileName')->nullable();
            $table->integer('sizeimageID')->nullable();
            $table->integer('productID')->nullable();
            $table->string('note')->nullable();
            $table->float('totalprice')->nullable();
            $table->integer('printphotoID')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('printphotodetails');
    }
}
