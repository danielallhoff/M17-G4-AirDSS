<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flight;
use App\Airport;
use App\DataAccess\FlightDataAccess as F;

class FlightsController extends Controller
{
    public function showAll(){
        $flights = F::showAll();
        return view('flights.flights', array('flights' => $flights));
    }
    public function showFlight($id){
        $flight = F::showFlight($id);
        return view('flights.flights', array('flights' => $flight));
    }

    public function showTickets($id){
        $tickets = F::showTickets($id);
        return view('tickets', array('tickets' => $tickets));
    }

    public function showBoardingPasses($id){
        $boardingpasses = F::showBoardingPasses($id);
        return view('boardingpasses', array('boardingpasses' => $boardingpasses));
    }
    public function showPlanes($id){
        $plane = F::showPlanes($id);
        return view('planes', array('planes' => $plane));
    }

    public function orderFlightsOrigin(){
        $flights = F::orderFlightsOrigin();
        return view('flights.flights', array('flights'=> $flights));
    }

    public function orderFlightsSalida(){
        $flights = F::orderFlightsSalida();
        return view('flights.flights', array('flights'=> $flights));
    }
    public function modificarFlight($id){
        $result = F::modificarFlight($id);
        return view('flights.modifyFlight', array('flight' =>$result[0] , 'airports'=>$result[1],'modificado'=>0));
    }
    public function eliminarFlight($id){
        $flight = Flight::findOrFail($id);
        $flight->delete();
        return back();
    }

    public function add(Request $request){
        $this->validate($request, [
            'origen' => 'required',
            'destino' => 'required',
            'capacidad' => 'required|integer|min:1',
            'salida' => 'required',
            'llegada' => 'required'

            //'salida' => 'required|date_format:d/m/Y H|before:llegada',
            //'llegada' => 'required|date_format:d/m/Y h|after_or_equal:salida'
            ]);
        $flight = new Flight();
        $flight->capacidad = $request->input('capacidad');
        $flight->airport_origen_id = $request->input('origen');
        $flight->airport_destino_id = $request->input('destino');
        $flight->fecha_salida = $request->input('salida');
        $flight->fecha_llegada = $request->input('llegada');
        $flight->save();

        return view('flights.addFlight', array('creado'=>1));;
    }
    public function edit(Request $request){
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