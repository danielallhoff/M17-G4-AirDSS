<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plane;

class PlanesController extends Controller
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
