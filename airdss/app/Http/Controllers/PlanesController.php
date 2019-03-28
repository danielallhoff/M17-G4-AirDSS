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
        return view('modifyPlane', array('plane' => $plane));
    }

    public function edit(Request $request)
    {

        $this->validate($request, [
            'modelo' => 'required',
            'capacidad' => 'required|numeric|min:1',
            'distancia_Vuelo' => 'required|numeric|min:0'
            ]);
            
        $plane = Plane::find($request->id);
        $plane->distancia_Vuelo = $request->distancia;
        $plane->capacidad = $request->capacidad;
        $plane->modelo = $request->modelo;
        $plane->save();

        return view('modifyPlane', array('plane' => $plane));
    }
}
