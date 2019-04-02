<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flight;

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

    public function orderFlightsCapacity(){
        $flights = Flight::orderBy('capacidadRestante')->paginate(5);
        return view('flights.flights', array('flights'=> $flights));
    }

    public function orderFlightsSalida(){
        $flights = Flight::orderBy('fecha_salida')->paginate(5);
        return view('flights.flights', array('flights'=> $flights));
    }
    public function modificarFlight($id){
        $flight = Flight::findOrFail($id);
        return view('flights.modifyFlight', array('flight' =>$flight));
    }
    public function eliminarFlight($id){
        $flight = Flight::findOrFail($id);
        $flight->delete();
        return view('FlightsController@showAll');
    }

    public function add(Request $request){
        $this->validate($request, [
            'AeropuertoOrigen' => 'required|alpha_dash',
            'AeropuertoDestino' => 'required|alpha_dash',
            'fechaSalida' => 'required|numeric|min:0',
            'fechaLlegada' => 'required|numeric|min:0',
            ]);
        $flight = new Flight();
        $flight->$aeropuertoOrigen = $request->input('AeropuertoOrigen');
        $flight->$aeropuertoDestino = $request->input('AeropuertoDestino');
        $flight->$fechaSalida = $request->input('fechaSalida');
        $flight->$fechaLlegada = $request->input('fechaLlegada');
        $flight->save();

        return view('FlightsController@showAll');
    }

    public function edit(Request $request){
        $this->validate($request, [
            'AeropuertoOrigen' => 'required|alpha_dash',
            'AeropuertoDestino' => 'required|alpha_dash',
            'fechaSalida' => 'required|numeric|min:0',
            'fechaLlegada' => 'required|numeric|min:0',
            ]);
        $flight = Flight::find($request->id);
        $flight->$aeropuertoOrigen = $request->input('AeropuertoOrigen');
        $flight->$aeropuertoDestino = $request->input('AeropuertoDestino');
        $flight->$fechaSalida = $request->input('fechaSalida');
        $flight->$fechaLlegada = $request->input('fechaLlegada');
        $flight->save();
        return view('FlightsController@showAll');
    }

    public function addFlight(){
        return view('flights.addFlight');
    }
}