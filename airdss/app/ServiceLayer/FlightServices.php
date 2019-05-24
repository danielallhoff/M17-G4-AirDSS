<?php

namespace App\ServiceLayer;
use Illuminate\Support\Facades\DB;
use App\Ticket;
use App\Flight;
use App\DataAccess\FlightDataAccess as FDA;
use App\DataAccess\TicketDataAccess as T;
use Illuminate\Support\Facades\Log;

class FlightServices{
    public static function asientosLibres($flightID){
        $reservedPlaces = [];
        $flight = null;
        try{
            $flight = Flight::find($flightID);
            
        }catch(\Exception $e){
            Log::Debug("No existe el vuelo" . $flightID);
            return [];
        }
        
        Log::Debug("Calculando asientos libres de vuelo" . $flightID);
        $tickets = $flight->tickets;
        foreach($tickets as $ticket){
            Log::Debug("Vuelo" . $flightID . " tiene ticket " . $ticket);
            $reservedPlaces[] = $ticket->asiento;
        }
        $placesAvailable = [];
        $ocupado = False;
        foreach (range(0,$flight->capacidad) as $asiento){            
            $ocupado = False;
            foreach ($reservedPlaces as $place){
                if($asiento == $place){
                    Log::Debug("Asiento "  .$asiento . " ocupado");
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