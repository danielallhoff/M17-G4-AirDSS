<?php

namespace App\DataAccess;

use Illuminate\Http\Request;
use App\Plane;

class PlaneDataAccess
{
    static public function showAll()
    {
        $planes = Plane::paginate(5);
        return $planes;
    }

    static public function showPlaneFlights($id)
    {
        $plane = Plane::findOrFail($id);
        $flights = $plane->flights;
        return array($flights, $plane);
    }

    static public function orderPlanesDistancia()
    {
        $planes = Plane::orderBy('distancia_Vuelo')->paginate(5);
        return $planes;
    }

    static public function orderPlanesCapacidad()
    {
        $planes = Plane::orderBy('capacidad', 'desc')->paginate(5);
        return $planes;
    }

    static public function modifyPlane($id)
    {
        $plane = Plane::findOrFail($id);
        return $plane;
    }

    static public function edit(Request $request)
    {            
        $plane = Plane::find($request->id);
        $plane->distancia_Vuelo = $request->distancia;
        $plane->capacidad = $request->capacidad;
        $plane->modelo = $request->modelo;
        $plane->save();

        return $plane;
    }

    static public function create(Request $request)
    {            
        $plane = new Plane();
        $plane->distancia_Vuelo = $request->distancia;
        $plane->capacidad = $request->capacidad;
        $plane->modelo = $request->modelo;
        $plane->save();

        return $plane;
    }

    static public function delete($id)
    {
        $plane = Plane::find($id);
        $plane->delete();       
    }
}