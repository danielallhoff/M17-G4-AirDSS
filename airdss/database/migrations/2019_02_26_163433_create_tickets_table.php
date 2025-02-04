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
            $table->integer('asiento');
            $table->date('fecha');
            $table->float('precio');
            /*
            $table->integer('flight_id')->nullable();
            $table->foreign('flight_id')->references('id')->on('flights');
            $table->integer('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('tickets');
    }
}
