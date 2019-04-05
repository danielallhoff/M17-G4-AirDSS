<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flight;
use App\Airport;
class FlightsController extends Controller
{
    public function showAll(){
        $flights = Flight::paginate(5);
        return view('flights.flights', array('flights' => $flights));
    }
    public function showFlight($id){
        $flight = Flight::findOrFail($id);
        return view('flights.flights', array('flights' => $flight));
    }

    public function showTickets($id){
        $flight = Flight::findOrFail($id);
        $tickets = $flight->tickets();
        return view('tickets', array('tickets' => $flights));
    }

    public function showBoardingPasses($id){
        $flight = Flight::findOrFail($id);
        $boardingpasses = $flight->boardingpasses();
        return view('boardingpasses', array('boardingpasses' => $boardingpasses));
    }
    public function showPlanes($id){
        $flight = Flight::findOrFail($id);
        $plane = $flight->plane();
        return view('planes', array('planes' => $plane));
    }

    public function orderFlightsOrigin(){
        $flights = Flight::orderBy('airportOrigen', 'desc')->paginate(5);
        return view('flights.flights', array('flights'=> $flights));
    }

    public function orderFlightsSalida(){
        $flights = Flight::orderBy('fecha_salida')->paginate(5);
        return view('flights.flights', array('flights'=> $flights));
    }
    public function modificarFlight($id){
        $flight = Flight::findOrFail($id);
        $airports = Airport::all();
        return view('flights.modifyFlight', array('flight' =>$flight , 'airports'=>$airports,'modificado'=>0));
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
            'capacidad' => 'required|integer|min:'.$flight->capacidadRestante(),
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