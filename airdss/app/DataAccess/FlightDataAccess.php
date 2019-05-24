<?php

namespace App\DataAccess;

use Illuminate\Http\Request;
use App\Flight as F;
use App\Airport;

class FlightDataAccess
{
    static public function showFlight($id){
        $flight = F::findOrFail($id);
        return $flight;
    }

    static public function showAll(){
        $flights = F::paginate(5);
        return $flights;
    }

    static public function showTickets($id){
        $flight = F::findOrFail($id);
        $tickets = $flight->tickets();
        return $tickets;
    }
    
    static public function showBoardingPasses($id){
        $flight = F::findOrFail($id);
        $boardingpasses = $flight->boardingpasses();
        return $boardingpasses;
    }
    
    static public function showPlanes($id){
        $flight = F::findOrFail($id);
        $plane = $flight->plane();
        return $plane;
    }

    static public function orderFlightsOrigin(){
        $flights = F::orderBy('airportOrigen', 'desc')->paginate(5);
        $airports = Airport::all();
        return array($flights, $airports);
    }

    static public function orderFlightsSalida(){
        $flights = F::orderBy('fecha_salida')->paginate(5);
        $airports = Airport::all();
        return array($flights, $airports);
    }

    static public function modificarFlight($id){
        $flight = F::findOrFail($id);
        $airports = Airport::all();
        return array($flight, $airports);
    }

    static public function eliminarFlight($id){
        $flight = F::findOrFail($id);
        $flight->delete();
    }

    static public function add(Request $request){
        
        $flight = new F();
        $flight->capacidad = $request->input('capacidad');
        $flight->airport_origen_id = $request->input('origen');
        $flight->airport_destino_id = $request->input('destino');
        $flight->fecha_salida = $request->input('salida');
        $flight->fecha_llegada = $request->input('llegada');
        $flight->precio = $request->input('precio');
        $flight->save();

        $airports = Airport::all();

        return $airports;
    }
    
    static public function edit(Request $request){
        
        $flight = F::findOrFail($request->id);
        $flight->capacidad = $request->input('capacidad');
        $flight->airport_origen_id = $request->input('origen');
        $flight->airport_destino_id = $request->input('destino');
        $flight->fecha_salida = $request->input('salida');
        $flight->fecha_llegada = $request->input('llegada');
        $flight->precio = $request->input('precio');
        $flight->save();
        
        $airports = Airport::all();

        return array($airports, $flight);
    }

    static public function addFlight(){
        $airports = Airport::all();
        return $airports;
    }

    static public function totalVuelos()
    {
        $flight = F::count();
        return $flight;
    }

    // busca de entre todos los vuelos cual está cancelado
    static public function allFlight()
    {
        $flight = F::all()->where('cancelado', '=', 1);
        return $flight;
    }
    static public function buscador(Request $request){
        $origen = $request->origen;
        $origen='%'.$origen.'%';
        //echo $origen;

        $destino = $request->destino;
        $destino='%'.$destino.'%';
        //echo($destino);
        //session(['opcion'=>$opcion,'text'=>$text]);
        //$airports = Airport::all();
        $airportOrigen = Airport::where('ciudad','like', $origen)->first();
        $airportDest = Airport::where('ciudad','like', $destino)->first();
        //echo($airportOrigen->id);
        //echo($airportDest->id);
        $flights = F::where('airport_origen_id','like',$airportOrigen->id)->where('airport_destino_id','like',$airportDest->id)->paginate(5);
        return $flights;
    }
}
