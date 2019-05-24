<?php

namespace App\ServiceLayer;
use Illuminate\Support\Facades\DB;
use App\ServiceLayer\FlightServices as FS;
use App\Ticket;
use App\User;
use App\Flight;
use App\BoardingPass;
use App\Plane;
use App\Airport;
use Illuminate\Support\Facades\Log;

class BuyServices{
    public static function buy($flightID, $clientID, $hasPackage, $asiento){
        $rollback = false;
        //Iniciar transacción
        DB::beginTransaction();
        //Comprobar datos(vuelo y cliente existe, asiento existe...etc)
        $flight = null;
        $client = null;
        $asientos = [];
        Log::Debug("Procediendo a compra del vuelo " . $flightID . " con asiento " . $asiento . " del cliente ". $clientID);
        try{
            $flight = Flight::find($flightID);
            Log::Debug("Flight " . $flightID . " existe!");
            $client = User::find($clientID);
            Log::Debug("Cliente " . $clientID . " existe!");
            $asientos = FS::asientosLibres($flightID);
        }catch(\Exception $e){
            $rollback = true;
        }
        
        $disponible = False;
        foreach($asientos as $ticket){
            if($ticket == $asiento){
                $disponible = True;
                break;
            }
        }
        //Generar código único.
        $codigo = strval($flightID) . strval($clientID) . strval($asiento);
        //Datos correctos
        if($flight != null  && $client != null && $disponible && !$flight->cancelado){
           
            //COmpra funciona aleatoriamente
            $compra_correcta = random_int(0,1);             
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
                    Log::Debug("Se ha podido asociar el ticket al vuelo!");
                    $ticket->user()->associate($client);
                    Log::Debug("Se ha podido asociar el ticket al cliente!");
                    $ticket->save();
                    Log::Debug("Ticket se ha podido añadir!");
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
                    Log::Debug("BoardingPass generado");
                    $flight->boardingpasses()->save($boardingPass);
                    $flight->tickets()->save($ticket);
                    $client->tickets()->save($ticket);
                    $flight->update();
                    $client->update();
                    
                    
                } catch (\Exception $e) {
                    Log::Debug("Error en compra del ticket para el cliente");
                    $rollback = true;
                }
            }
            else{
                Log::Debug("Compra ha fallado! Datos de compra erróneos o servidor ha fallado");
                //Se recupera estado anterior a la transacción               
                $rollback = true;
            }
           
        }
        else{
            $rollback = true;
        }
        if($rollback){
            Log::Debug("Rollback! BBDD vuelve a estado inicial");
            DB::rollBack();
            return null;
        }
        DB::commit();
        return $ticket;
    }
}