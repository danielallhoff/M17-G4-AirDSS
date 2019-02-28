<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $id;
    public $codigo;
    public $asiento;
    public $clase;
    public $fecha;

    public function client() {
        return $this->belongsTo('App\Client'); 
    }

    public function boardingpasses() {
        return $this->hasMany('App\Boardingpass'); 
    }

    public function flight() {
        return $this->belongsTo('App\Flight'); 
    }
}
