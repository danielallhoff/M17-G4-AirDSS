<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unique();
            $table->string('asiento');
            $table->string('clase');
            $table->date('fecha');
            $table->integer('boardingpass_id')->nullable();
            $table->foreign('boardingpass_id')->references('id')->on('boarding_passes')->onDelete('cascade');
            $table->integer('flight_id');
            $table->foreign('flight_id')->references('id')->on('flights')->nullable();
            $table->integer('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
