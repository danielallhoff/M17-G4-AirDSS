<?php

use Illuminate\Database\Seeder;
use App\Plane;

class PlanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $plane = new Plane([
            'modelo' => 'KFC420',
            'capacidad' => 150,
            'distancia_Vuelo' => 120
        ]);
        $plane->save();

        $plane = new Plane([
            'modelo' => 'JET5',
            'capacidad' => 300,
            'distancia_Vuelo' => 500
        ]);
        $plane->save();

        $plane = new Plane([
            'modelo' => 'JET1',
            'capacidad' => 190,
            'distancia_Vuelo' => 1200
        ]);
        $plane->save();
    }
}
