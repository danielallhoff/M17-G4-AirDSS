<?php

use Illuminate\Database\Seeder;
use App\Flight;
use App\BoardingPass;
use App\Ticket;
use App\Plane;
use App\Airport;

class BoardingPassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plane = new Plane([
            'modelo' => 'GT60',
            'capacidad' => 160,
            'distancia_Vuelo' => 790
        ]);
        $plane->save();

        $flight = new Flight([
            'capacidad' => 150,
            'fecha_llegada' => '19/03/2019 19:00',
            'fecha_salida' => '19/03/2019 18:00'    
        ]);

        $airportO = new Airport([
            'codigo'=>12,
            'ciudad'=>'Roma'
        ]);
        $airportO->save();

        $airportD = new Airport([
            'codigo'=>13,
            'ciudad'=>'Venecia'
        ]);
        $airportD->save();
        $flight->airportOrigen()->associate($airportO);
        $flight->airportDestino()->associate($airportD);
        $flight->plane()->associate($plane);
        $flight->save();

        $ticket = new Ticket([
            'codigo' => 1200,
            'asiento' => 'B32',
            'clase' => 'primera',
            'fecha' => '19/03/2019'
        ]);
        $ticket->save();

        $boardingpass = new BoardingPass([
            'asiento'=>'12A', 
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $boardingpass->flight()->associate($flight);
        $boardingpass->ticket()->associate($ticket);
        $boardingpass->save();

        $boardingpass = new BoardingPass([
            'asiento'=>'11B', 
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $boardingpass->flight()->associate($flight);
        $boardingpass->ticket()->associate($ticket);
        $boardingpass->save();

        $boardingpass = new BoardingPass([
            'asiento'=>'10D', 
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $boardingpass->flight()->associate($flight);
        $boardingpass->ticket()->associate($ticket);
        $boardingpass->save();

        $boardingpass = new BoardingPass([
            'asiento'=>'12E', 
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $boardingpass->flight()->associate($flight);
        $boardingpass->ticket()->associate($ticket);
        $boardingpass->save();

        $boardingpass = new BoardingPass([
            'asiento'=>'10F', 
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $boardingpass->flight()->associate($flight);
        $boardingpass->ticket()->associate($ticket);
        $boardingpass->save();

        $boardingpass = new BoardingPass([
            'asiento'=>'11A', 
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $boardingpass->flight()->associate($flight);
        $boardingpass->ticket()->associate($ticket);
        $boardingpass->save();

        $boardingpass = new BoardingPass([
            'asiento'=>'09E', 
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $boardingpass->flight()->associate($flight);
        $boardingpass->ticket()->associate($ticket);
        $boardingpass->save();
    }
}
