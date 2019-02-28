<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $id;
    public $dni;
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $telefono;
    public $email;

    public function tickets(){
        return $this->hasMany('App\Ticket');
    }
}
