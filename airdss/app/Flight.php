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
}
