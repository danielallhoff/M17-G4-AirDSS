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
        Schema::create('boarding_passes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asiento');
            $table->string('puerta');
            $table->date('fecha');
            $table->time('embarque');
            $table->time('llegada');
            $table->boolean('cancelado')->nullable()->default(0);
            /*
            $table->integer('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->integer('flight_id');
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
            */
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
