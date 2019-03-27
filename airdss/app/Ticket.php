<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    public function client() {
        return $this->belongsTo('App\Client'); 
    }

    public function boardingpasses() {
        return $this->hasMany('App\BoardingPass'); 
    }

    public function flight() {
        return $this->belongsTo('App\Flight'); 
    }
}
