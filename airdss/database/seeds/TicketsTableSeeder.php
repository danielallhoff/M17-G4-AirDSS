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
        //
        DB::table('clients')->delete();
        DB::table('tickets')->delete();
        DB::table('boarding_passes')->delete();
        DB::table('flights')->delete();

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

        $ticket = new Ticket([
            'codigo' => 101,
            'asiento' => 'C02',
            'clase' => 'turista',
            'fecha' => '19/03/2019'
        ]);

        $ticket->client()->associate($ticket);
        $ticket->flight()->associate($ticket);
        $ticket->save();

        $ticket = new Ticket([
            'codigo' => 102,
            'asiento' => 'B02',
            'clase' => 'primera',
            'fecha' => '20/03/2019'
        ]);

        $ticket->client()->associate($ticket);
        $ticket->flight()->associate($ticket);
        $ticket->save();

        $ticket = new Ticket([
            'codigo' => 103,
            'asiento' => 'A32',
            'clase' => 'turista',
            'fecha' => '26/04/2019'
        ]);

        $ticket->client()->associate($ticket);
        $ticket->flight()->associate($ticket);
        $ticket->save();

        $ticket = new Ticket([
            'codigo' => 104,
            'asiento' => 'D25',
            'clase' => 'turista',
            'fecha' => '30/05/2019'
        ]);

        $ticket->client()->associate($ticket);
        $ticket->flight()->associate($ticket);
        $ticket->save();

        $ticket = new Ticket([
            'codigo' => 105,
            'asiento' => 'C07',
            'clase' => 'turista',
            'fecha' => '10/06/2019'
        ]);

        $ticket->client()->associate($ticket);
        $ticket->flight()->associate($ticket);
        $ticket->save();

        $ticket = new Ticket([
            'codigo' => 106,
            'asiento' => 'E05',
            'clase' => 'turista',
            'fecha' => '12/06/2019'
        ]);

        $ticket->client()->associate($ticket);
        $ticket->flight()->associate($ticket);
        $ticket->save();

        $ticket = new Ticket([
            'codigo' => 107,
            'asiento' => 'A01',
            'clase' => 'Primera',
            'fecha' => '09/08/2019'
        ]);

        $ticket->client()->associate($ticket);
        $ticket->flight()->associate($ticket);
        $ticket->save();
        
        $ticket = new Ticket([
            'codigo' => 108,
            'asiento' => 'C03',
            'clase' => 'Primera',
            'fecha' => '24/12/2019'
        ]);

        $ticket->client()->associate($ticket);
        $ticket->flight()->associate($ticket);
        $ticket->save();
    }
}
