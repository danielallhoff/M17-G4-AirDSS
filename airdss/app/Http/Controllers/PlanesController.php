<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plane;

class PlanesController extends Controller
{
    public function showAll()
    {
        $planes = Plane::paginate(5);
        return view('planes.planes', ['planes' => $planes]);
    }

    public function showPlaneFlights($id)
    {
        $plane = Plane::findOrFail($id);
        $flights = $plane->flights;
        return view('planes.flightsPlane', array('flights' => $flights, 'plane' => $plane));
    }

    public function orderPlanesDistancia()
    {
        $planes = Plane::orderBy('distancia_Vuelo')->paginate(5);
        return view('planes.planes', ['planes' => $planes]);
    }

    public function orderPlanesCapacidad()
    {
        $planes = Plane::orderBy('capacidad', 'desc')->paginate(5);
        return view('planes.planes', ['planes' => $planes]);
    }

    public function modifyPlane($id)
    {
        $plane = Plane::findOrFail($id);
        return view('planes.modifyPlane', array('plane' => $plane, 'mod' => 0));
    }

    public function edit(Request $request)
    {

        $this->validate($request, [
            'modelo' => 'required|alpha_dash',
            'capacidad' => 'required|numeric|min:1',
            'distancia' => 'required|numeric|min:0'
            ]);
            
        $plane = Plane::find($request->id);
        $plane->distancia_Vuelo = $request->distancia;
        $plane->capacidad = $request->capacidad;
        $plane->modelo = $request->modelo;
        $plane->save();

        return view('planes.modifyPlane', array('plane' => $plane, 'mod' => 1));
    }

    public function addPlane()
    {
        return view('planes.addPlane', ['cre' => 0]);
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'modelo' => 'required|alpha_dash',
            'capacidad' => 'required|numeric|min:1',
            'distancia' => 'required|numeric|min:0'
            ]);
            
        $plane = new Plane();
        $plane->distancia_Vuelo = $request->distancia;
        $plane->capacidad = $request->capacidad;
        $plane->modelo = $request->modelo;
        $plane->save();

        return view('planes.addPlane', array('plane' => $plane, 'cre' => 1));
    }

    public function delete($id)
    {
        $plane = Plane::find($id);
        $plane->delete();

        $planes = Plane::paginate(5);
        return view('planes.planes', ['planes' => $planes]);
    }
}
