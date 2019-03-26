<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use App\Client;
use App\Flight;
use App\BoardingPass;
use App\Airport;
use App\Plane;
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
        $plane = new Plane([
            'modelo' => 'BO124',
            'capacidad' => 200,
            'distancia_Vuelo' => 1000
        ]);
        $plane->save();

        $ticket = new Ticket([
            'codigo' => 302,
            'asiento' => '02C',
            'clase' => 'turista',
            'fecha' => '21/03/2018'
        ]);
        $ticket->save();
        /*$boardingpass = new BoardingPass([
            'asiento'=>'09F',
            'puerta' => 'B32',
            'fecha' => '21/03/2018',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);
        $boardingpass->save();*/

        $flight = new Flight([
            'capacidad' => 125,
            'fecha_llegada' => '03/05/2018',
            'fecha_salida' => '03/05/2018'
        ]);

        //$flight->boardingpasses()->associate($boadingpass);
        //$flight->tickets()->associate($ticket);
        $flight->plane()->associate($plane);
        $flight->save();
        //flight2
        $ticket = new Ticket([
            'codigo' => 303,
            'asiento' => '02C',
            'clase' => 'turista',
            'fecha' => '21/03/2018'
        ]);

        $ticket->flight()->associate($flight);
        $ticket->save();

        /*$boardingpass->flight()->associate($flight);
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
        $boardingpass->save();*/


        //flight2
        $flight = new Flight([
            'capacidad' => 160,
            'fecha_llegada' => '01/05/2018',
            'fecha_salida' => '02/05/2018'
        ]);


        //$flight->boardingpasses()->associate($boardingpass);
        //$flight->tickets()->associate($ticket);
        $flight->plane()->associate($plane);
        $flight->save();

    }
}
