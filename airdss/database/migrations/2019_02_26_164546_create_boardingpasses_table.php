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
        // he puesto nullable para poder hacer los seeds sin tener aun los del resto de tablas
        Schema::create('boardingpasses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asiento');
            $table->string('puerta');
            $table->date('fecha')->nullable();
            $table->time('embarque')->nullable();
            $table->time('llegada')->nullable();
            $table->integer('ticket_id')->references('id')->on('tickets')->nullable();
            $table->integer('flight_id')->references('id')->on('flights')->nullable();
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
        Schema::dropIfExists('boardingpasses');
    }
}
