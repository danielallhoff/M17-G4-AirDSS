<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use App\Client;
use App\Package;
class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dmy = DateTime::createFromFormat('Y-m-d', '2000-12-15')->format('Y-m-d');
        $client = new Client([
            'dni'=>'00000001A',
            'nombre'=>'Juan',
            'apellidos'=>'Garcia Gonzales',
            'telefono' => 672000000,
            'email'=>'jgg@gmail.com',
            'fechaNto'=>$dmy
        ]);
        $client->save();

        $ticket = new Ticket([
            'codigo' => 222,
            'asiento' => '02C',
            'clase' => 'turista',
            'fecha' => '19/03/2019'
        ]);
        
        $ticket->client()->associate($client);
        $ticket->save();

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
    }
}
