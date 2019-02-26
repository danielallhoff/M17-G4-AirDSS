<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardingPassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_passes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asiento');
            $table->string('puerta');
            $table->date('fecha');
            $table->time('embarque');
            $table->time('llegada');
            $table->integer('ticket_id')->references('id')->on('tickets');
            $table->integer('flight_id')->references('id')->on('flights');
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
        Schema::dropIfExists('boarding_passes');
    }
}
