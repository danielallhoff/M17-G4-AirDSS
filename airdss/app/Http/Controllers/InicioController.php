<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function inicio()
    {
        return view('inicio.airdss');
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
