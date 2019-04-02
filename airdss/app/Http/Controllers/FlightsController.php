<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flight;

class FlightsController extends Controller
{
    public function showAll(){
        $flights = Flight::paginate(5);
        return view('flights', array('flights' => $flights));
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

    public function orderFlightsDate(){
        $flights = Flight::orderBy('')->paginate(5);
        return view('flights', array('flights'=> $flights));
    }

    public function orderFlightsOrigin(){
        $flights = Flight::orderBy('airportOrigen')->paginate(5);
        return view('flights', array('flights'=> $flights));
    }
    public function modificarFlight($id){
        $flight = Flight::findOrFail($id);
        return view('modifyFlight', $flight);
    }
    public function eliminarFlight($id){
        $flight = Flight::findOrFail($id);
        //$flight->delete();
        $flights = Flight::paginate(5);
        return view('flights', array('flights'=>$flights));
    }
/*
    public function modificarFlight($id){

    }*/
}




/*
class FlightsController extends Controller
{
    public function showAll()
    {
        $planes = Plane::paginate(5);
        return view('planes', ['planes' => $planes]);
    }

    public function showPlaneFlights($id)
    {
        $plane = Plane::findOrFail($id);
        $flights = $plane->flights;
        return view('flightsPlane', array('flights' => $flights, 'plane' => $plane));
    }

    public function orderPlanesDistancia()
    {
        $planes = Plane::orderBy('distancia_Vuelo')->paginate(5);
        return view('planes', ['planes' => $planes]);
    }

    public function orderPlanesCapacidad()
    {
        $planes = Plane::orderBy('capacidad', 'desc')->paginate(5);
        return view('planes', ['planes' => $planes]);
    }

    public function modifyPlane($id)
    {
        $plane = Plane::findOrFail($id);
        $modelo = $plane->modelo;
        $capacidad = $plane->capacidad;
        $distancia = $plane->distancia_Vuelo;
        return view('modifyPlane', array('plane' => $plane, 'id' =>$id, 
        'modelo' => $modelo, 'capacidad' => $capacidad, 'distancia' => $distancia));
    }

    public function edit($id,$modelo, $capacidad, $distancia)
    {
        $plane = Plane::find($id);
        $plane->modelo = $modelo;
        $plane->capacidad = $capacidad;
        $plane->distancia_Vuelo = $distancia;
        $plane->save();
        $planes = Plane::all()->sortByDesc('distancia_Vuelo');
        return view('planes', ['planes' => $planes]);
    }
}
*/