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
        $airports = Airport::all();
        return view('flights.flights', array('flights' => $flights,'airports'=>$airports));
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
        return view('boardingPass.boardingpasses', array('boardingpasses' => $boardingpasses));
    }
    public function showPlanes($id){
        $plane = F::showPlanes($id);
        return view('planes.planes', array('planes' => $plane));
    }

    public function orderFlightsOrigin(){
        $result = F::orderFlightsOrigin();
        $flights = $result[0];
        $airports = $result[1];
        return view('flights.flights', array('flights'=> $flights, 'airports' => $airports));
    }

    public function orderFlightsSalida(){
        $result = F::orderFlightsSalida();
        $flights = $result[0];
        $airports = $result[1];
        return view('flights.flights', array('flights'=> $flights, 'airports' => $airports));
    }
    public function modificarFlight($id){
        $result = F::modificarFlight($id);
        return view('flights.modifyFlight', array('flight' =>$result[0] , 'airports'=>$result[1],'modificado'=>0));
    }
    public function eliminarFlight($id){
        F::eliminarFlight($id);
        return back();
    }

    public function add(Request $request){
        $this->validate($request, [
            'origen' => 'required',
            'destino' => 'required',
            'capacidad' => 'required|integer|min:1',
            'salida' => 'required',
            'llegada' => 'required',
            'precio' => 'required|numeric'

            //'salida' => 'required|date_format:d/m/Y H|before:llegada',
            //'llegada' => 'required|date_format:d/m/Y h|after_or_equal:salida'
            ]);
        
        $airports = F::add($request);
        
        return view('flights.addFlight', array('airports' => $airports, 'creado'=>1));;
    }

    public function edit(Request $request){
        $flight = Flight::findOrFail($request->id);
        $this->validate($request, [
            'origen' => 'required',
            'destino' => 'required',
            'capacidad' => 'required|integer|min:'.(count($flight->tickets())),
            'salida' => 'required',
            'llegada' => 'required',
            'precio' => 'required|numeric'

            //'salida' => 'required|date_format:d/m/Y h:i:s|before:llegada',
            //'llegada' => 'required|date_foarmat:d/m/Y h:i:s|after_or_equal:salida'
            ]);

        $result = F::edit($request);
        
        return view('flights.modifyFlight', array('airports'=>$result[0],'flight'=>$result[1],'modificado'=>1));
    }

    public function addFlight(){
        $airports = F::addFlight();
        return view('flights.addFlight', array('airports'=>$airports, 'creado'=>0));
    }

    //Buscador-------------------------------------------------------------
    public function buscar(Request $request){
        /*$origen = $request->origen;
        $origen='%'.$origen.'%';
        //echo $origen;

        $destino = $request->destino;
        $destino='%'.$destino.'%';
        //echo($destino);
        //session(['opcion'=>$opcion,'text'=>$text]);
        $airports = Airport::all();
        $airportOrigen = Airport::where('ciudad','like', $origen)->first();
        $airportDest = Airport::where('ciudad','like', $destino)->first();
        //echo($airportOrigen->id);
        //echo($airportDest->id);
        $flights = Flight::where('airport_origen_id','like',$airportOrigen->id)->where('airport_destino_id','like',$airportDest->id)->paginate(5);
        */
        $flights= F::buscador($request);
        $airports = Airport::all();


        return view('flights.flights', array('flights' => $flights, 'airports'=>$airports));
    }
    //---------------------------------------------------------------------
}