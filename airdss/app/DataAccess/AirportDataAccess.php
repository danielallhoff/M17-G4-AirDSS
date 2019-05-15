<?php

namespace App\DataAccess;

use App\Airport;

class AirportDataAccess
{
    static public function showAll(){
        $airports = Airport::paginate(5);
        return $airports;
    }

    static public function showTickets($id){
        $flight = Flight::findOrFail($id);
        $tickets = $flight->tickets();
        return view('tickets', array('tickets' => $flights));
    }

    static public function showBoardingPasses($id){
        $flight = Flight::findOrFail($id);
        $boardingpasses = $flight->boardingpasses();
        return $boardingpasses;
    }
    static public function showPlanes($id){
        $flight = Flight::findOrFail($id);
        $plane = $flight->plane();
        return $plane;
    }
    static public function showAirports(){
        $airports = Airport::paginate(5);
        return $airports;
    }

    static public function removeAirport($id){
        $airport = Airport::findOrFail($id);
        $airport->delete();
    }
}