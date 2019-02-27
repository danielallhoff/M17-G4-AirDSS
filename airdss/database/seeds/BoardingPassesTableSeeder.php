<?php

use Illuminate\Database\Seeder;
use App\Flight;
use App\BoardingPass;

class BoardingPassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flight = new Flight([
            'origen'=>'Alicante',
            'destino' => 'Madrid',
            'capacidad' => 150,
            'fecha_llegada' => '19:00',
            'fecha_salida' => '18:00'    
        ]);
        $flight->save();

        $boardingpass = new BoardingPass([
            'asiento'=>'12A', 
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $boardingpass->flight()->associate($flight);
        $boardingpass->save();
    }
}
