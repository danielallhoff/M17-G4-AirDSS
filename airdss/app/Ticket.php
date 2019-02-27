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
        return $this->belongsTo('App\client'); 
    }

    public function boardingpasses() {
        return $this->hasMany('App\boardingpass'); 
    }

    public function flight() {
        return $this->belongsTo('App\flight'); 
    }
}
