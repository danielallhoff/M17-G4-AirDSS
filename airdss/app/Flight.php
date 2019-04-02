<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function boardingpasses(){
        return $this->hasMany('App\BoardingPass');
    }

    public function tickets(){
        return $this->hasMany('App\Ticket');
    }
    public function airportOrigen(){
        return $this->belongsTo('App\Airport');
    }
    public function plane()
    {
        return $this->belongsTo('App\Plane');
    }
    public function airportDestino(){
        return $this->belongsTo('App\Airport');
    }
    public function capacidadRestante(){
        return $this->capacidad - count($this->tickets());
    }
}
