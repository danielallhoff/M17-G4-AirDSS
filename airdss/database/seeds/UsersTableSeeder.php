<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        $dnis = ['50547898r','65847521r','98756425q','74855628f','56541232v','65547582p','30259564m','20568479d', '65847521a'];
        $nombres =['Juan','Francisco','Javier','Marta','Veronica','Eva','Ines','Alba','Usuario'];
        $apellidos =['Montoro Perez','Francisco Herrera','Perez Ramos','Herrera Martinez','Ramos Montoya','Martinez Romero','Montoya Montoro','Romero Francisco', 'Usuario'];
        $telefonos =[656524052,756912023,624879637,636208574,635958429,683504097,666554455,698741122, 698741123];
        $emails =['juan123@gmail.com','francisco897@yahoo.es','javier845@gmail.com','marta98754@yahoo.es','veronica892@gmail.com','eva48461@yahoo.es','ines6546565@yahoo.es','alba132@gmail.com', '1234'];
        $fechaNacimiento =['1950-01-01','1990-02-01','1999-05-22','2000-07-07','1997-6-28','2009-05-05','1989-05-20','1980-11-28','1980-11-28'];
        $passwords =['1234','1234','1234','1234','1234','1234','1234','1234', '1234'];
        $esAdmin = [1,0,0,0,0,0,0,0,0];
        //
        //Ca
        for ($i=0; $i < 8; $i++) { 
            //$aux=Carbon::parse($fechaNacimiento[$i]);
            //$aux=Carbon::create('2000','01','01');
            //$aux = strtotime('10-16-2003');
            //$newformat = date('d-m-Y',$aux);
            $dmy = DateTime::createFromFormat('Y-m-d', $fechaNacimiento[$i])->format('Y-m-d');
            $user = new User([
                'dni'=>$dnis[$i],
                'name'=>$nombres[$i],
                'apellidos'=>$apellidos[$i],
                'telefono'=>$telefonos[$i],
                'email'=>$emails[$i],
                'fechaNto'=>$dmy,
                'password' => bcrypt($passwords[$i]),
                'esAdmin' => $esAdmin[$i]
            ]);
            $user->save();
        }

    }
}
