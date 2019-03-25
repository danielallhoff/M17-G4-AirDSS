<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public function flightsOrigen(){
        return $this->hasMany('App\Flight');
    }

    public function flightsDestino(){
        return $this->hasMany('App\Flight');
    }
}
