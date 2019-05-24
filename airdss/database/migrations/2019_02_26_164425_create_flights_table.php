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
            $table->integer('capacidad');
            $table->datetime('fecha_llegada');
            $table->datetime('fecha_salida');
            $table->integer('airport_origen_id')->nullable();
            $table->foreign('airport_origen_id')->references('id')->on('airports')->onDelete('cascade');
            $table->integer('airport_destino_id')->nullable();
            $table->foreign('airport_destino_id')->references('id')->on('airports')->onDelete('cascade');
            $table->boolean('cancelado')->nullable()->default(0);
            $table->float('precio');
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
