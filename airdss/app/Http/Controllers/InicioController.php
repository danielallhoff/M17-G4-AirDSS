<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataAccess\FlightDataAccess as F;
use App\ServiceLayer\AvisosAdminServices as A;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    //
    public function inicio()
    {
        if(Auth::check() && Auth::user()->esAdministrador())
        {
            A::notificarCancelacionAvion();
            $flights = F::allFlight();
        }
        else
            $flights = 0;
        return view('inicio.airdss', ['flights' => $flights]);
    }
    public function contacto()
    {
        //return view('contacto.contacto');
        return view('about_us.contactUs');
    }

    public function informacion()
    {
        return view('about_us.infoProyecto');
    }
}
