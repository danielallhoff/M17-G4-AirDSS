<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use App\Client;
use App\Flight;
use App\BoardingPass;
use App\Airport;
class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Flight1
        $flight = new Flight([
            'capacidad' => 150,
            'fecha_llegada' => '01/04/2018',
            'fecha_salida' => '01/04/2018'
        ]);
        $flight->save();
        $boardingpass = new BoardingPass([
            'asiento'=>'09F',
            'puerta' => 'B32',
            'fecha' => '21/03/2018',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $ticket = new Ticket([
            'codigo' => 302,
            'asiento' => '02C',
            'clase' => 'turista',
            'fecha' => '21/03/2018'
        ]);

        $ticket->flight()->associate($flight);
        $ticket->save();

        $boardingpass->flight()->associate($flight);
        $boardingpass->ticket()->associate($ticket);
        $boardingpass->save();

        $boardingpass = new BoardingPass([
            'asiento'=>'09X',
            'puerta' => 'B32',
            'fecha' => '21/04/2018',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);
        $boardingpass->flight()->associate($flight);
        $boardingpass->ticket()->associate($ticket);
        $boardingpass->save();


        //flight2
        $flight = new Flight([
            'capacidad' => 160,
            'fecha_llegada' => '01/05/2018',
            'fecha_salida' => '02/05/2018'
        ]);
        $flight->save();

    }
}
