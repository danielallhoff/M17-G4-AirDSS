<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airport;
class AirportsController extends Controller
{
    public function showAll(){
        $airports = Airport::paginate(5);
        return view('airports', array('airports' => $airports));
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
    public function showAirports(){
        $airports = Airport::paginate(5);
        return view('airports', array('airports' => $airports));
    }

    public function removeAirport($id){
        $airport = Airport::findOrFail($id);
        $airport->delete();
        return back();
    }
}
