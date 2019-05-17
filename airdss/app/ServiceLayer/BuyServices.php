<?php

namespace App\ServiceLayer;
use Illuminate\Support\Facades\DB;
use App\Ticket;
use App\User;
use App\Flight;
use App\BoardingPass;
use App\Plane;
use App\Airport;


class BuyServices{
    public static function buy($flightID, $clientID, $hasPackage, $asiento){
    
        //Comprobar datos(vuelo y cliente existe, asiento existe...etc)
        $flight = Flight::find($flightID);
        $client = User::find($clientID);
        $disponible = False;
        foreach($flight->ticketsDisponibles() as $ticket){
            if($ticket == $asiento){
                $disponible = True;
                break;
            }
        }
        //Datos correctos
        if($flight != null  $$ client != null && $disponible){
            //Iniciar transacción
            DB:beginTransaction();
        
            $ticket = new Ticket();

            $boardingPass = new BoardingPass();
            
            //COmpra funciona aleatoriamente
            $compra_correcta = random_int(0,1);
            sleep(1);
            if($compra_correcta){
                $precio = 0;
                if($hasPackage){
                    $precio += 10;
                }
                $precio += $flight->precio;
                
                $ticket->asiento = $asiento;        
                $ticket->fecha = date('Y-m-d');
                $ticket->precio = $precio;
                
                $boardingPass->asiento = $asiento;

                $boardingPass->ticket()->associate($boardingPass);
                $ticket->flight()->associate($flight);
                $ticket->user()->associate($client);



                $client->update();
                $ticket->update();
                $flight->update();
                
            }
            else{
                //Se recupera estado anterior a la transacción
                DB:rollBack();
            }

            DB:commit();
        }
        else{
            return false;
        }

        
        return $ticket;
    }
}