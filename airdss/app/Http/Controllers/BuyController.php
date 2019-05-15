<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flight;
use App\DataAccess\FlightDataAccess as F;

class BuyController extends Controller
{
    public function confView($id){
        $flight = F::showFlight($id);
        return view('conf', array('flight'=>$flight));
    }

    public function conf(Request $request){
        $flight = F::showFlight($request->id);
        $this->validate($request, [
            'asiento' => 'required',
            'equipaje' => 'required',
            ]);
        
        return view('pay', array('flight'=>$flight, 'asiento'=>$request->asiento, 'equipaje'=>$request->equipaje));;
    }
    //Simular pago y si ha funcionado realizar cambios en todos los objetos
    public function pay(Request $request){
        $flight = F::showFlight($request->id);
        //Llamada a capa de servico
        $this->validate($request, [
            'titular' => 'required',
            'iban' => 'required',
            'cvv' => 'required|integer|min:3',
            ]);
        
        return view('inicio.airdss');
    }
}
