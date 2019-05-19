<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
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

    public function getOrigenAttribute(){
        return $this->airportOrigen->ciudad;
    }

    public function getDestinoAttribute(){
        return $this->airportDestino->ciudad;
    }

    public function ticketsDisponibles(){
        $reservedPlaces = [];
        
        foreach($this->tickets() as $ticket){
            $reservedPlaces[] = $ticket->asiento;
        }
        $placesAvailable = [];
        $ocupado = False;
        foreach (range(0,$this->capacidad) as $asiento){            
            $ocupado = False;
            foreach ($reservedPlaces as $place){
                if($asiento == $place){
                    $ocupado = True;
                    break;
                }
            }
            if(!$ocupado){
                $placesAvailable[] = $asiento;
            }
        }
        return $placesAvailable;
    }
}
