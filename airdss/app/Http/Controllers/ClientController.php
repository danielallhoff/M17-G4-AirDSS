<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientController extends Controller
{
    public function showClients(){
        $clientes = Client::paginate(5);
        return view('listClient',array ('clientes'=> $clientes)) ;
    }
}
