<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string("origen");
            $table->string("destino");
            $table->integer("capacidad");
            $table->datetime("fecha_llegada");
            $table->datetime("fecha_salida");
            $table->timestamps();
            $table->integer('boardingpass_id')->unsigned()->nullable();
            $table->foreign('boardingpass_id')->references('id')->on('boarding_passes')->onDelete('cascade');
            $table->integer('ticket_id')->unsigned()->nullable();
            $table->foreign('ticket_id')->references('id')->on('tickets');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
