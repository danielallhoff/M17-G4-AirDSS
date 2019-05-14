<?php

namespace App\DataAccess;

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
        return $flights;
    }

    static public function orderFlightsSalida(){
        $flights = F::orderBy('fecha_salida')->paginate(5);
        return $flights;
    }

    static public function modificarFlight($id){
        $flight = F::findOrFail($id);
        $airports = Airport::all();
        return array($flight, $airports);
    }

    static public function eliminarFlight($id){
        $flight = F::findOrFail($id);
        $flight->delete();
        return back();
    }

    static public function add(Request $request){
        
        $flight = new Flight();
        $flight->capacidad = $request->input('capacidad');
        $flight->airport_origen_id = $request->input('origen');
        $flight->airport_destino_id = $request->input('destino');
        $flight->fecha_salida = $request->input('salida');
        $flight->fecha_llegada = $request->input('llegada');
        $flight->save();

        return view('flights.addFlight', array('creado'=>1));;
    }
    
    static public function edit(Request $request){
        $flight = Flight::findOrFail($request->id);
        $this->validate($request, [
            'origen' => 'required',
            'destino' => 'required',
            'capacidad' => 'required|integer|min:'.(count($flight->tickets())),
            'salida' => 'required',
            'llegada' => 'required'

            //'salida' => 'required|date_format:d/m/Y h:i:s|before:llegada',
            //'llegada' => 'required|date_foarmat:d/m/Y h:i:s|after_or_equal:salida'
            ]);
        $flight->capacidad = $request->input('capacidad');
        $flight->airport_origen_id = $request->input('origen');
        $flight->airport_destino_id = $request->input('destino');
        $flight->fecha_salida = $request->input('salida');
        $flight->fecha_llegada = $request->input('llegada');
        $flight->save();
        
        $airports = Airport::all();
        return view('flights.modifyFlight', array('airports'=>$airports,'flight'=>$flight,'modificado'=>1));
    }

    public function addFlight(){
        $airports = Airport::all();
        return view('flights.addFlight', array('airports'=>$airports, 'creado'=>0));
    }
}
