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
        $rollback = false;
        //Iniciar transacción
        DB::beginTransaction();
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
        //Generar código único.
        $codigo = strval($flightID) . strval($clientID) . strval($asiento);
        //Datos correctos
        if($flight != null  && $client != null && $disponible){
           
            $ticket = new Ticket();

            //COmpra funciona aleatoriamente
            $compra_correcta = random_int(0,1);            
            sleep(1);
            if($compra_correcta){
                $precio = 0;
                if($hasPackage){
                    $precio += 10;
                }
                $precio += $flight->precio;
                
                try {
                    $ticket = new Ticket([
                        'asiento' => $asiento,
                        'fecha' => date('Y-m-d'),
                        'precio' => $precio
                    ]);

                    $ticket->codigo = $codigo;
                    $ticket->flight()->associate($flight);
                    $ticket->user()->associate($client);

                    $ticket->save();

                    $boardingPass = new BoardingPass([
                        'asiento'=> $asiento, 
                        'puerta' => random_int(0,10),
                        'fecha' => date('d-m-Y', strtotime($flight->fecha_salida)),
                        'embarque' => date("H:i", strtotime($flight->fecha_salida)),
                        'llegada' => date("H:i", strtotime($flight->fecha_llegada))
                    ]);                

                    $boardingPass->ticket()->associate($ticket);
                    $boardingPass->flight()->associate($flight);
                    $boardingPass->save();
                    
                    $client->update();               
                    $flight->update();
                } catch (\Exception $e) {
                    $rollback = true;
                    
                }
            }
            else{
                //Se recupera estado anterior a la transacción               
                $rollback = true;
            }
           
        }
        else{
            $rollback = true;
        }
        if($rollback){
            DB::rollBack();
            return null;
        }
        DB::commit();
        return $ticket;
        
        
    }
}