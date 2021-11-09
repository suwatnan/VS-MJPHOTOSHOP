<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFormatprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formatprints', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('formatprintID')->nullable();
            $table->string('formatprint')->nullable();
            $table->string('imageFileName')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('formatprints');
    }
}
