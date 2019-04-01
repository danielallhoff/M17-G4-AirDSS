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
    public function orderClientNameAsc(){
        $clientes = Client::orderBy('nombre', 'asc')->paginate(5);
        return view('listClient' ,['clientes'=>$clientes]);
    }
    public function orderClientNameDesc(){
        $clientes = Client::orderBy('nombre', 'desc')->paginate(5);
        return view('listClient' ,['clientes'=>$clientes]);
    }
    public function orderClientDateAsc(){
        $clientes = Client::orderBy('fechaNto','asc')->paginate(5);
        return view('listClient', ['clientes'=>$clientes]);
    }
    public function orderClientDateDesc(){
        $clientes = Client::orderBy('fechaNto','desc')->paginate(5);
        return view('listClient', ['clientes'=>$clientes]);
    }

}
