<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEditdepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editdeposits', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('editdepositID')->nullable();
            $table->string('imagedeposit')->nullable();
            $table->integer('bookingID')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('editdeposits');
    }
}
