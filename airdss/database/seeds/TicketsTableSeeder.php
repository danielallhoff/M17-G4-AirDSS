<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use App\Client;
use App\Flight;
use App\BoardingPass;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $client = new Client([
            'dni'=>'00000000A',
            'nombre'=>'Juan',
            'apellido1'=>'Garcia',
            'apellido2'=>'Gonzales',
            'telefono' => 672000000,
            'email'=>'jgg@gmail.com'
        ]);
        $client->save();

        $flight = new Flight([
            'origen'=>'Alicante',
            'destino' => 'Madrid',
            'capacidad' => 132,
            'fecha_llegada' => '19:00',
            'fecha_salida' => '18:00'    
        ]);
        $flight->save();

        /**
         * Prueba 1
         */
        $ticket = new Ticket([
            'codigo' => 101,
            'asiento' => '02C',
            'clase' => 'turista',
            'fecha' => '19/03/2019'
        ]);
        
        $ticket->client()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();
        //Comprobamos varios boardingpass asociados a un ticket
        $boarding = new BoardingPass([
            'asiento'=>'02C', 
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '8:00',
            'llegada' => '9:00'
        ]);
        $boarding->flight()->associate($flight);
        $boarding->ticket()->associate($ticket);
        $boarding->save();

        $boarding = new BoardingPass([
            'asiento'=>'02C', 
            'puerta' => 'B45',
            'fecha' => '20/03/2019',
            'embarque' => '17:00',
            'llegada' => '18:15'
        ]);
        $boarding->flight()->associate($flight);
        $boarding->ticket()->associate($ticket);        
        $boarding->save();
       
        /*
        $flight = new Flight([
            'origen'=>'Alicante',
            'destino' => 'Atenas',
            'capacidad' => 132,
            'fecha_llegada' => '10:00',
            'fecha_salida' => '18:15'    
        ]);
        $flight->save();

        $ticket = new Ticket([
            'codigo' => 102,
            'asiento' => '02B',
            'clase' => 'primera',
            'fecha' => '20/03/2019'
        ]);

        $ticket->client()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();

        $boarding = new BoardingPass([
            'asiento'=>'20D', 
            'puerta' => 'C12',
            'fecha' => '20/03/2019',
            'embarque' => '10:00',
            'llegada' => '18:15'
        ]);

        $boarding->flight()->associate($flight);
        $boarding->ticket()->associate($ticket);        
        $boarding->save();

       
          Prueba 3
         
        $ticket = new Ticket([
            'codigo' => 103,
            'asiento' => '32A',
            'clase' => 'turista',
            'fecha' => '26/04/2019'
        ]);

        $ticket->client()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();

       
         Prueba 4
         
        $ticket = new Ticket([
            'codigo' => 104,
            'asiento' => '25D',
            'clase' => 'turista',
            'fecha' => '30/05/2019'
        ]);

        $ticket->client()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();

        
          Prueba 5
         
        $ticket = new Ticket([
            'codigo' => 105,
            'asiento' => '07C',
            'clase' => 'turista',
            'fecha' => '10/06/2019'
        ]);

        $ticket->client()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();

        
          Prueba 6
         
        $ticket = new Ticket([
            'codigo' => 106,
            'asiento' => '05E',
            'clase' => 'turista',
            'fecha' => '12/06/2019'
        ]);

        $ticket->client()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();

        
          Prueba 7
         
        $ticket = new Ticket([
            'codigo' => 107,
            'asiento' => '01A',
            'clase' => 'Primera',
            'fecha' => '09/08/2019'
        ]);

        $ticket->client()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();

        
          Prueba 8
         
        $flight = new Flight([
            'origen'=>'Albacete',
            'destino' => 'Beijin',
            'capacidad' => 300,
            'fecha_llegada' => '19:00',
            'fecha_salida' => '7:00'    
        ]);
        $flight->save();

        $ticket = new Ticket([
            'codigo' => 108,
            'asiento' => '03C',
            'clase' => 'Primera',
            'fecha' => '24/12/2019'
        ]);

        $ticket->client()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();
        */
    }
}
