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
        $user= new User([
            'name'=>'daniel41735',
            'email'=>'dani.allhoff@hotmail.com'
            'password'=>'1234'
        ]);
        $user->save();
        $user= new User([
            'name'=>'davidrizo',
            'email'=>'davidrizo@ua.es',
            'password'=>'1234'
        ]);
        $user->save();
    }
}
