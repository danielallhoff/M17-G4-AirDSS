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
        return view('contacto.contacto');
    }

    public function informacion()
    {
        return view('infoProyecto');
    }
}
