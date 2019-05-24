<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use App\User;
use App\Flight;
use App\BoardingPass;
use App\Plane;
use App\Airport;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------------------------
        // Prueba Ticket-Usuario1
        //------------------------
        $dmy = DateTime::createFromFormat('Y-m-d', '2000-12-15')->format('Y-m-d');
        $client = new User([
            'dni'=>'00000000A',
            'name'=>'Juan',
            'apellidos'=>'Garcia Gonzales',
            'telefono' => 672123456,
            'email'=>'jgg@gmail.com',
            'fechaNto'=>$dmy,
            'password' => bcrypt('1234'),
            'esAdmin' => 0
        ]);
        $client->save();
        
        $plane = new Plane([
            'modelo' => 'FG60',
            'capacidad' => 132,
            'distancia_Vuelo' => 7000
        ]);
        $plane->save();

        $flight = new Flight([
            'capacidad' => 132,
            'fecha_llegada' => '19/03/2019 19:00',
            'fecha_salida' => '19/03/2019 18:00',
            'precio' => 10    
        ]);
        
        $airportO = new Airport([
            'codigo'=>27,
            'ciudad'=>'Sevilla'
        ]);
        $airportO->save();

        $airportD = new Airport([
            'codigo'=>40,
            'ciudad'=>'Granada'
        ]);
        $airportD->save();
        $flight->airportOrigen()->associate($airportO);
        $flight->airportDestino()->associate($airportD);
        $flight->plane()->associate($plane);
        $flight->save();

        //Prueba Ticket 1
        $ticket = new Ticket([
            'codigo' => 101,
            'asiento' => 0,
            'fecha' => '19/03/2019',
            'precio' => 100
        ]);
        
        $ticket->user()->associate($client);
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
       
        //Prueba Ticket 2
        
        $flight = new Flight([
            'capacidad' => 132,
            'fecha_llegada' => ' 24/03/2019 19:00',
            'fecha_salida' => '24/03/2019 18:15',
            'precio' => 100    
        ]);
        $flight->airportOrigen()->associate($airportD);
        $flight->airportDestino()->associate($airportO);
        $flight->plane()->associate($plane);
        $flight->save();
        

        $ticket = new Ticket([
            'codigo' => 102,
            'asiento' =>24,
            'fecha' => '24/03/2019',
            'precio' => 100
        ]);

        $ticket->user()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();

        $boarding = new BoardingPass([
            'asiento'=>'4', 
            'puerta' => 'C3',
            'fecha' => '24/03/2019',
            'embarque' => '19:00',
            'llegada' => '18:15'
        ]);

        $boarding->flight()->associate($flight);
        $boarding->ticket()->associate($ticket);        
        $boarding->save();

       

        //------------------------
        // Prueba Ticket-Usuario2
        //------------------------
        $dmy = DateTime::createFromFormat('Y-m-d', '1997-03-05')->format('Y-m-d');
        $client = new User([
            'dni'=>'00000001A',
            'name'=>'Alejandro',
            'apellidos'=>'Panagiotidis Arri',
            'telefono' => 672235844,
            'email'=>'apa@gmail.com',
            'fechaNto'=>$dmy,
            'password' => bcrypt('1234'),
            'esAdmin' => 0
        ]);
        $client->save();

        $plane = new Plane([
            'modelo' => 'A737',
            'capacidad' => 132,
            'distancia_Vuelo' => 7000
        ]);
        $plane->save();

        $flight = new Flight([
            'capacidad' => 132,
            'fecha_llegada' => '26/04/2019 12:30',
            'fecha_salida' => '26/04/2019 10:30',
            'precio' => 90   
        ]);
        
        $airportO = new Airport([
            'codigo'=>14,
            'ciudad'=>'Grecia'
        ]);
        $airportO->save();

        $airportD = new Airport([
            'codigo'=>15,
            'ciudad'=>'Paris'
        ]);
        $airportD->save();
        $flight->airportOrigen()->associate($airportO);
        $flight->airportDestino()->associate($airportD);
        $flight->plane()->associate($plane);
        $flight->save();


        $ticket = new Ticket([
            'codigo' => 103,
            'asiento' => 3,
            'fecha' => '26/04/2019',
            'precio' => 90
        ]);

        $ticket->user()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();
        
        $boarding = new BoardingPass([
            'asiento'=>'3', 
            'puerta' => 'A10',
            'fecha' => '26/04/2019',
            'embarque' => '10:30',
            'llegada' => '12:30'
        ]);

        $boarding->flight()->associate($flight);
        $boarding->ticket()->associate($ticket);        
        $boarding->save();
       
        //Prueba Ticket 4

        $flight = new Flight([
            'capacidad' => 132,
            'fecha_llegada' => '20/05/2019 16:10',
            'fecha_salida' => '20/05/2019 14:15',
            'precio' => 90    
        ]);
        $flight->airportOrigen()->associate($airportD);
        $flight->airportDestino()->associate($airportO);
        $flight->plane()->associate($plane);
        $flight->save();
         
        $ticket = new Ticket([
            'codigo' => 104,
            'asiento' => 4,
            'fecha' => '20/05/2019',
            'precio' => 90
        ]);

        $ticket->user()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();

        $boarding = new BoardingPass([
            'asiento'=>'3', 
            'puerta' => 'B02',
            'fecha' => '20/05/2019',
            'embarque' => '14:15',
            'llegada' => '16:10'
        ]);

        $boarding->flight()->associate($flight);
        $boarding->ticket()->associate($ticket);        
        $boarding->save();

        //Prueba 5
        $flight = new Flight([
            'capacidad' => 132,
            'fecha_llegada' => '10/06/2019 19:30',
            'fecha_salida' => '10/06/2019 10:30',
            'precio' => 90   
        ]);
        
        $airportO = new Airport([
            'codigo'=>16,
            'ciudad'=>'Madrid'
        ]);
        $airportO->save();

        $airportD = new Airport([
            'codigo'=>17,
            'ciudad'=>'Miami'
        ]);
        $airportD->save();
        $flight->airportOrigen()->associate($airportO);
        $flight->airportDestino()->associate($airportD);
        $flight->plane()->associate($plane);
        $flight->save();


        $ticket = new Ticket([
            'codigo' => 105,
            'asiento' => 3,
            'fecha' => '10/06/2019',
            'precio' => 400
        ]);

        $ticket->user()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();
        
        $boarding = new BoardingPass([
            'asiento'=>'3', 
            'puerta' => 'A10',
            'fecha' => '10/06/2019',
            'embarque' => '10:30',
            'llegada' => '19:30'
        ]);

        $boarding->flight()->associate($flight);
        $boarding->ticket()->associate($ticket);        
        $boarding->save();

        //Prueba 6
        $flight = new Flight([
            'capacidad' => 132,
            'fecha_llegada' => '20/06/2019 17:30',
            'fecha_salida' => '20/06/2019 9:00',
            'precio' => 450   
        ]);

        $flight->airportOrigen()->associate($airportD);
        $flight->airportDestino()->associate($airportO);
        $flight->plane()->associate($plane);
        $flight->save();

        $ticket = new Ticket([
            'codigo' => 106,
            'asiento' => 5,
            'fecha' => '20/06/2019',
            'precio' => 450
        ]);

        $ticket->user()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();
        
        $boarding = new BoardingPass([
            'asiento'=>'5', 
            'puerta' => 'B11',
            'fecha' => '20/06/2019',
            'embarque' => '9:00',
            'llegada' => '17:30'
        ]);

        $boarding->flight()->associate($flight);
        $boarding->ticket()->associate($ticket);        
        $boarding->save();
        /*
        
        //Prueba 7
         
        $ticket = new Ticket([
            'codigo' => 107,
            'asiento' => 7,
            'fecha' => '09/08/2019',
            'precio' => 100
        ]);

        $ticket->user()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();

        
        //Prueba 8
         
        $flight = new Flight([
            'capacidad' => 300,
            'fecha_llegada' => '24/12/2019 19:00',
            'fecha_salida' => '24/12/2019 17:00',
            'precio' => 120    
        ]);
        $flight->airportOrigen()->associate($airportO);
        $flight->airportDestino()->associate($airportD);
        $flight->plane()->associate($plane);
        $flight->save();

        $ticket = new Ticket([
            'codigo' => 108,
            'asiento' => 8,
            'fecha' => '24/12/2019',
            'precio' => 120 
        ]);

        $ticket->user()->associate($client);
        $ticket->flight()->associate($flight);
        $ticket->save();
        */
    }
}
