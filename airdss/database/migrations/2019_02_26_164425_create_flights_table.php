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
<<<<<<< HEAD
            $table->integer('capacidad');
            $table->datetime('fecha_llegada');
            $table->datetime('fecha_salida');
            $table->integer('airport_origen_id')->nullable();
            $table->foreign('airport_origen_id')->references('id')->on('airports');
            $table->integer('airport_destino_id')->nullable();
            $table->foreign('airport_destino_id')->references('id')->on('airports');
=======
            $table->integer("capacidad");
            $table->datetime("fecha_llegada");
            $table->datetime("fecha_salida");
            $table->integer('plane_id');
            $table->foreign('plane_id')->references('id')->on('planes');
>>>>>>> 04d8f38971382ae3b52dba4c6958d691aac37569
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
        Schema::dropIfExists('flights');
    }
}
