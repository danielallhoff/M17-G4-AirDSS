<?php

use Illuminate\Database\Seeder;

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
        $ticket = new Ticket([
            'codigo' => 302,
            'asiento' => '02C',
            'clase' => 'turista',
            'fecha' => '21/03/2018'
        ]);

        $ticket->save();

        $boardingpass = new BoardingPass([
            'asiento'=>'09F',
            'puerta' => 'B32',
            'fecha' => '21/03/2018',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);
        $boardingpass->save();
        $flight = new Flight([
            'capacidad' => 150,
            'fecha_llegada' => '01/04/2018',
            'fecha_salida' => '01/04/2018'
        ]);


        $flight->boardingpasses()->associate($boadingpass);
        $flight->tickets()->associate($ticket);
        $flight->save();
        //flight2
        $ticket = new Ticket([
            'codigo' => 303,
            'asiento' => '02C',
            'clase' => 'turista',
            'fecha' => '19/03/2019'
        ]);

        $ticket->save();

        $boardingpass = new BoardingPass([
            'asiento'=>'09X',
            'puerta' => 'B32',
            'fecha' => '21/04/2018',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);
        $boardingpass->save();
        $flight = new Flight([
            'capacidad' => 160,
            'fecha_llegada' => '01/05/2018',
            'fecha_salida' => '02/05/2018'
        ]);


        $flight->boardingpasses()->associate($boardingpass);
        $flight->tickets()->associate($ticket);
        $flight->save();




    }
}
