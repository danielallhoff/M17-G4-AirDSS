<?php

use Illuminate\Database\Seeder;
use App\Flight;
use App\BoardingPass;
use App\Ticket;
use App\Client;
use App\Airport;
use Carbon\Carbon;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->delete();

        $dnis = ['50547898r','65847521r','98756425q','74855628f','56541232v','65547582p','30259564m','20568479d'];
        $nombres =['Juan','Francisco','Javier','Marta','Veronica','Eva','Ines','Alba'];
        $apellidos =['Montoro Perez','Francisco Herrera','Perez Ramos','Herrera Martinez','Ramos Montoya','Martinez Romero','Montoya Montoro','Romero Francisco'];
        $telefonos =[656524052,756912023,624879637,636208574,635958429,683504097,666554455,698741122];
        $emails =['juan123@gmail.com','francisco897@yahoo.es','javier845@gmail.com','marta98754@yahoo.es','veronica892@gmail.com','eva48461@yahoo.es','ines6546565@yahoo.es','alba132@gmail.com'];
        $fechaNacimiento =['01-01-1950','01-02-1990','22-05-1999','07-07-2000','28-6-1997','05-05-2009','20-05-1989','26-11-1980'];
        //
        //Ca
        for ($i=0; $i < 8; $i++) { 
            //$aux=Carbon::parse($fechaNacimiento[$i]);
            //$aux=Carbon::create('2000','01','01');
            //$aux = strtotime('10-16-2003');
            //$newformat = date('d-m-Y',$aux);
            $dmy = DateTime::createFromFormat('d-m-Y', $fechaNacimiento[$i])->format('d-m-Y');
            $client = new Client([
                'dni'=>$dnis[$i],
                'nombre'=>$nombres[$i],
                'apellidos'=>$apellidos[$i],
                'telefono'=>$telefonos[$i],
                'email'=>$emails[$i],
                'fechaNto'=>$dmy
            ]);
            $client->save();
        }
    }
}
