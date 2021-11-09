<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEditpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editpayments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('editpaymentID')->nullable();
            $table->string('imagebill2')->nullable();
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
        Schema::drop('editpayments');
    }
}
