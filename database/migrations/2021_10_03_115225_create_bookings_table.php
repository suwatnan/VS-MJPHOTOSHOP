<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('bookingID')->nullable();
            $table->dateTime('date')->nullable();
            $table->integer('formatID')->nullable();
            $table->integer('timeID')->nullable();
            $table->string('note')->nullable();
            $table->integer('userID')->nullable();
            $table->string('queues')->nullable();
            $table->string('receivingID')->nullable();
            $table->integer('status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookings');
    }
}
