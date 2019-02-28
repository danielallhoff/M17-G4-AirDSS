<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public $id;
    public $capacidad;
    public $fecha_llegada;
    public $fecha_salida;

    public function boardingpasses(){
        return $this->hasMany('App\BoardingPass');
    }

    public function tickets(){
        return $this->hasMany('App\Ticket');
    }
}
