<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuyController extends Controller
{
    public function confView($id){
        $flight = Flight::findOrFail($id);
        return view('conf', 'flight'=>$flight);
    }

    public function conf(Request $request){
        $this->validate($request, [
            'clase' => 'required',
            'asiento' => 'required',
            'equipaje' => 'required',
            ]);
        
        return view('pay', array('clase'=>$request->clase,'asiento'=>$request->asiento, 'equipaje'=>$request->equipaje));;
    }
    //Simular pago y si ha funcionado realizar cambios en todos los objetos
    public function pay(Request $request){
        //Capa de servicio aquí.
        $this->validate($request, [
            'titular' => 'required',
            'iban' => 'required',
            'cvv' => 'required|integer|min:3',
            ]);
        
        return view('airdss');
    }
    /*
    public function pay($id){
        $flight = Flight::findOrFail($id);
        return view('pay', 'flight'=>$flight);
    }*/
}
