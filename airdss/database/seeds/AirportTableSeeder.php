<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use App\Client;
use App\Flight;
use App\BoardingPass;
use App\Airport;
use App\Plane;
class AirportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Airport1
        $airport = new Airport([
            'codigo'=>23,
            'ciudad'=>'Torrevieja'
            ]);
        $airport->save();
        //Airport2
        $airportD = new Airport([
            'codigo'=>24,
            'ciudad'=>'Alicante'
            ]);
        $airportD->save();
        $plane = new Plane([
            'modelo' => 'R3D0',
            'capacidad' => 190,
            'distancia_Vuelo' => 1290
        ]);
        $plane->save();
        $flight = new Flight([
            'capacidad' => 190,
            'fecha_llegada' => '01/05/2019 9:00',
            'fecha_salida' => '01/05/2019 8:10',
            'precio' => 65.5
        ]);
        $flight->plane()->associate($plane);
        $flight->airportOrigen()->associate($airport);
        $flight->airportDestino()->associate($airportD);
        $flight->save();



        $flight = new Flight([
            'capacidad' => 200,
            'fecha_llegada' => '01/05/2019 12:45',
            'fecha_salida' => '01/05/2019 11:25'
            'precio' => 80
        ]);
        $flight->plane()->associate($plane);
        $flight->airportOrigen()->associate($airport);
        $flight->airportDestino()->associate($airport);
        $flight->save();

    }
}
