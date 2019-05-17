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
        $airportO = new Airport([
            'codigo'=>26,
            'ciudad'=>'Barcelona'
        ]);
        $airportO->save();

        $airportD = new Airport([
            'codigo'=>90,
            'ciudad'=>'Madrid'
        ]);
        $airportD->save();
        //Flight1
        $plane = new Plane([
            'modelo' => 'BO124',
            'capacidad' => 200,
            'distancia_Vuelo' => 1000
        ]);
        $plane->save();

        $ticket = new Ticket([
            'codigo' => 302,
            'asiento' => 9,
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
            'fecha_llegada' => '21/03/2019 12:30',
            'fecha_salida' => '21/03/2019 11:30'
            'precio' => 65.3
        ]);

        //$flight->boardingpasses()->associate($boadingpass);
        //$flight->tickets()->associate($ticket);
        $flight->airportOrigen()->associate($airportO);
        $flight->airportDestino()->associate($airportD);
        $flight->plane()->associate($plane);
        $flight->save();
        //flight2
        $ticket = new Ticket([
            'codigo' => 303,
            'asiento' => 10,
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
            'fecha_llegada' => '01/05/2019 14:00',
            'fecha_salida' => '01/05/2019 13:15'
            'precio' => 70
        ]);


        //$flight->boardingpasses()->associate($boardingpass);
        //$flight->tickets()->associate($ticket);
        $flight->airportOrigen()->associate($airportO);
        $flight->airportDestino()->associate($airportD);
        $flight->plane()->associate($plane);
        $flight->save();

    }
}
