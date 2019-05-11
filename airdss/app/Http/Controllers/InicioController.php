<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function inicio()
    {
        return view('airdss');
    }
    public function contacto()
    {
        //return view('contacto.contacto');
        return view('contactUs');
    }

    public function informacion()
    {
        return view('about_us.infoProyecto');
    }
}
