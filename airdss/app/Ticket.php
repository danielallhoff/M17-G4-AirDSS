<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['asiento', 'fecha', 'precio'];

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

    public function getOrigenAttribute(){
        return $this->flight->origen;
    }

    public function getDestinoAttribute(){
        return $this->flight->destino;
    }

    public function getActualBoardingPass(){
        foreach ($this->boardingpasses() as $boardingpass){
            if($boardingpass->cancelado == False){
                return $boardingpass;
            }
        }
        return null;
    }
}
