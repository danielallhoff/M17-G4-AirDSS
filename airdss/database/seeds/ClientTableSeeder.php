<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client')->delete();

        $dnis = ['50547898r','65847521r','98756425q','74855628f','56541232v','65547582p','30259564m','20568479d'];
        $nombres =['juan','francisco','javier','marta','veronica','eva','ines','alba'];
        $apellidos =['montoro','francisco','perez','herrera','ramos','martinez','montoya','romero'];
        $apellidos2 =['perez','herrera','ramos','martinez','montoya','romero','montoro','francisco'];
        $telefonos =[656524052,756912023,624879637,636208574,635958429,683504097,666554455,698741122];
        $emails =['juan123@gmail.com','francisco897@yahoo.es','javier845@gmail.com','marta98754@yahoo.es','veronica892@gmail.com','eva48461@yahoo.es','ines6546565@yahoo.es','alba132@gmail.com'];

        for ($i=0; $i < 8; $i++) { 
            $client = new client([
                'dni'=>$dnis[$i],
                'nombre'=>$nombres[$i],
                'apellido1'=>$apellidos[$i],
                'apellido2'=>$apellidos2[$i],
                'telefono'=>$telefonos[$i],
                'email'=>$emails[i]
            ]);
            $client->save();
        }
    }
}
