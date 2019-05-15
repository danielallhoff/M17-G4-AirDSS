<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plane;
use App\DataAccess\PlaneDataAccess as P;

class PlanesController extends Controller
{
    public function showAll()
    {
        $planes = P::showAll();
        return view('planes.planes', ['planes' => $planes]);
    }

    public function showPlaneFlights($id)
    {
        $result = P::showPlaneFlights($id);
        return view('planes.flightsPlane', array('flights' => $result[0], 'plane' => $result[1]));
    }

    public function orderPlanesDistancia()
    {
        $planes = P::orderPlanesDistancia();
        return view('planes.planes', ['planes' => $planes]);
    }

    public function orderPlanesCapacidad()
    {
        $planes = P::orderPlanesCapacidad();
        return view('planes.planes', ['planes' => $planes]);
    }

    public function modifyPlane($id)
    {
        $plane = P::modifyPlane($id);
        return view('planes.modifyPlane', array('plane' => $plane, 'mod' => 0));
    }

    public function edit(Request $request)
    {

        $this->validate($request, [
            'modelo' => 'required|alpha_dash',
            'capacidad' => 'required|numeric|min:1',
            'distancia' => 'required|numeric|min:0'
            ]);
            
        $plane = P::edit($request);

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
            
        $plane = P::create($request);

        return view('planes.addPlane', array('plane' => $plane, 'cre' => 1));
    }

    public function delete($id)
    {
        P::delete($id);
        return back();
    }
}
