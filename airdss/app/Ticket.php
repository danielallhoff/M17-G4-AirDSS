<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    public function user() {
        return $this->belongsTo('App\User'); 
    }

    public function boardingpasses() {
        return $this->hasMany('App\BoardingPass'); 
    }

    public function packages() {
        return $this->hasMany('App\Package'); 
    }

    public function flight() {
        return $this->belongsTo('App\Flight'); 
    }
}
