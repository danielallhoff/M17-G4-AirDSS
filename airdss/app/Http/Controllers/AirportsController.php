<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airport;
use App\DataAccess\AirportDataAccess as A;


class AirportsController extends Controller
{
    public function showAll(){
        $airports = A::showAll();
        return view('airports.airports', array('airports' => $airports));
    }

    public function showTickets($id){
        $flights = A::showTickets($id);
        return view('tickets.tickets', array('tickets' => $flights));
    }

    public function showBoardingPasses($id){
        $boardingpasses = A::showBoardingPasses($id);
        return view('boardingPass.boardingpasses', array('boardingpasses' => $boardingpasses));
    }
    public function showPlanes($id){
        $plane = A::showPlanes($id);
        return view('planes.planes', array('planes' => $plane));
    }
    public function showAirports(){
        $airports = A::showAirports();
        return view('airports.airports', array('airports' => $airports));
    }

    public function removeAirport($id){
        A::removeAirport($id);
        return back();
    }
}
