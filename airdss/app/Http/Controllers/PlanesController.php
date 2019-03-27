<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plane;

class PlanesController extends Controller
{
    public function showAll()
    {
        $planes = Plane::all()->sortByDesc('distancia_Vuelo');
        return view('planes', ['planes' => $planes]);
    }

    public function showPlaneFlights($id)
    {
        $plane = Plane::findOrFail($id);
        $flights = $plane->flights;
        return view('flightsPlane', array('flights' => $flights, 'plane' => $plane));
    }
}
