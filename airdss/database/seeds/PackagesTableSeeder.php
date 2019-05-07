<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use App\User;
use App\Package;
use App\Plane;
use App\Flight;
use App\Airport;
use App\BoardingPass;
class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Prueba 1
        $plane = new Plane([
            'modelo' => '737',
            'capacidad' => 140,
            'distancia_Vuelo' => 7000
        ]);
        $plane->save();

        $flight = new Flight([
            'capacidad' =>140,
            'fecha_llegada' => '3/04/2019 11:15',
            'fecha_salida' => '3/04/2019 9:30'    
        ]);
        
        $airportO = new Airport([
            'codigo'=>01,
            'ciudad'=>'Alicante'
        ]);
        $airportO->save();

        $airportD = new Airport([
            'codigo'=>45,
            'ciudad'=>'Vigo'
        ]);
        $airportD->save();
        $flight->airportOrigen()->associate($airportO);
        $flight->airportDestino()->associate($airportD);
        $flight->plane()->associate($plane);
        $flight->save();

        $dmy = DateTime::createFromFormat('Y-m-d', '2000-12-15')->format('Y-m-d');
        $User = new User([
            'dni'=>'10000001A',
            'name'=>'Alejandro',
            'apellidos'=>'Garcia Puerta',
            'telefono' => 672000000,
            'email'=>'agp@gmail.com',
            'fechaNto'=>$dmy,
            'password' => '1234',
            'esAdmin' => 0
        ]);
        $User->save();

        $ticket = new Ticket([
            'codigo' => 222,
            'asiento' => '02C',
            'clase' => 'turista',
            'fecha' => '3/04/2019'
        ]);
        
        $ticket->User()->associate($User);
        $ticket->flight()->associate($flight);
        $ticket->save();

        $boarding = new BoardingPass([
            'asiento'=>'22D', 
            'puerta' => 'C03',
            'fecha' => '3/04/2019',
            'embarque' => '9:10',
            'llegada' => '11:15'
        ]);
        $boarding->flight()->associate($flight);
        $boarding->ticket()->associate($ticket);
        $boarding->save();

        $package = new Package([
            'peso' => 17.90,
            'ancho' => 20,
            'largo' => 30,
            'alto' => 20
        ]);
        $package->ticket()->associate($ticket);
        $package->save();

        $package = new Package([
            'peso' => 23.00,
            'ancho' => 30.5,
            'largo' => 40,
            'alto' => 15
        ]);
        $package->ticket()->associate($ticket);
        $package->save();

        $package = new Package([
            'peso' => 19.2,
            'ancho' => 20,
            'largo' => 20,
            'alto' => 20
        ]);
        $package->ticket()->associate($ticket);
        $package->save();

        //
        //Prueba 2
        $plane = new Plane([
            'modelo' => '737',
            'capacidad' => 140,
            'distancia_Vuelo' => 7000
        ]);
        $plane->save();

        $flight = new Flight([
            'capacidad' =>140,
            'fecha_llegada' => '5/04/2019 19:15',
            'fecha_salida' => '5/04/2019 18:00'    
        ]);
        
        /*$airportO = new Airport([
            'codigo'=>01,
            'ciudad'=>'Alicante'
        ]);
        $airportO->save();*/

        $airportD = new Airport([
            'codigo'=>20,
            'ciudad'=>'Bilbao'
        ]);
        $airportD->save();
        $flight->airportOrigen()->associate($airportO);
        $flight->airportDestino()->associate($airportD);
        $flight->plane()->associate($plane);
        $flight->save();

        $dmy = DateTime::createFromFormat('Y-m-d', '1997-5-4')->format('Y-m-d');
        $user = new User([
            'dni'=>'10000002A',
            'name'=>'David',
            'apellidos'=>'Diaz Puerta',
            'telefono' => 672000000,
            'email'=>'ddp@gmail.com',
            'fechaNto'=>$dmy,
            'password' => '1234',
            'esAdmin' => 0
        ]);
        $user->save();

        $ticket = new Ticket([
            'codigo' => 109,
            'asiento' => '10B',
            'clase' => 'turista',
            'fecha' => '5/04/2019'
        ]);
        
        $ticket->User()->associate($User);
        $ticket->flight()->associate($flight);
        $ticket->save();

        $boarding = new BoardingPass([
            'asiento'=>'11A', 
            'puerta' => 'B40',
            'fecha' => '5/04/2019',
            'embarque' => '17:40',
            'llegada' => '19:10'
        ]);
        $boarding->flight()->associate($flight);
        $boarding->ticket()->associate($ticket);
        $boarding->save();

        $package = new Package([
            'peso' => 15.3,
            'ancho' => 60,
            'largo' => 80,
            'alto' => 24
        ]);
        $package->ticket()->associate($ticket);
        $package->save();

        $package = new Package([
            'peso' => 22.00,
            'ancho' => 40,
            'largo' => 70,
            'alto' => 20
        ]);
        $package->ticket()->associate($ticket);
        $package->save();

        //Prueba 3
        $plane = new Plane([
            'modelo' => '737',
            'capacidad' => 140,
            'distancia_Vuelo' => 7000
        ]);
        $plane->save();

        $flight = new Flight([
            'capacidad' =>140,
            'fecha_llegada' => '9/04/2019 12:20',
            'fecha_salida' => '9/04/2019 11:00'    
        ]);
        
        /*$airportO = new Airport([
            'codigo'=>01,
            'ciudad'=>'Alicante'
        ]);
        $airportO->save();*/

        $airportD = new Airport([
            'codigo'=>29,
            'ciudad'=>'San Sebastian'
        ]);
        $airportD->save();
        $flight->airportOrigen()->associate($airportO);
        $flight->airportDestino()->associate($airportD);
        $flight->plane()->associate($plane);
        $flight->save();

        $dmy = DateTime::createFromFormat('Y-m-d', '1989-1-17')->format('Y-m-d');
        $user = new User([
            'dni'=>'10000003A',
            'name'=>'Marisol',
            'apellidos'=>'Arriola Echeverria',
            'telefono' => 672000000,
            'email'=>'mae@gmail.com',
            'fechaNto'=>$dmy,
            'password' => '1234',
            'esAdmin' => 0
        ]);
        $user->save();

        $ticket = new Ticket([
            'codigo' => 110,
            'asiento' => '01A',
            'clase' => 'primera',
            'fecha' => '9/04/2019'
        ]);
        
        $ticket->user()->associate($User);
        $ticket->flight()->associate($flight);
        $ticket->save();

        $boarding = new BoardingPass([
            'asiento'=>'01A', 
            'puerta' => 'A10',
            'fecha' => '9/04/2019',
            'embarque' => '10:35',
            'llegada' => '12:20'
        ]);
        $boarding->flight()->associate($flight);
        $boarding->ticket()->associate($ticket);
        $boarding->save();

        $package = new Package([
            'peso' => 20,
            'ancho' => 60,
            'largo' => 80,
            'alto' => 24
        ]);
        $package->ticket()->associate($ticket);
        $package->save();
    }
}
