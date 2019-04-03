<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientController extends Controller
{
    public $nombre;

    //ListarCliente
    public function showClients(){
        $clientes = Client::paginate(5);
        return view('listClient',array ('clientes'=> $clientes)) ;
    }
    public function orderClientNameAsc(){
        //$clientes = Client::orderBy('nombre', 'asc')->paginate(5);

        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = Client::where($opcion,'like',session('text'))->orderBy('nombre', 'asc')->paginate(5);
        }
        else{
            $clientes = Client::orderBy('nombre', 'asc')->paginate(5);
        }
        
        return view('listClient' ,['clientes'=>$clientes]);
    }
    public function orderClientNameDesc(){
        //echo "ordenando por ".session('opcion') .", con el texto ".session('text');
        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = Client::where($opcion,'like',session('text'))->orderBy('nombre', 'desc')->paginate(5);
        }
        else{
            $clientes = Client::orderBy('nombre', 'desc')->paginate(5);
        }
        
        return view('listClient' ,['clientes'=>$clientes]);
    }
    public function orderClientDateAsc(){
        //$clientes = Client::orderBy('fechaNto','asc')->paginate(5);

        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = Client::where($opcion,'like',session('text'))->orderBy('fechaNto', 'asc')->paginate(5);
        }
        else{
            $clientes = Client::orderBy('fechaNto', 'asc')->paginate(5);
        }
        return view('listClient', ['clientes'=>$clientes]);
    }
    public function orderClientDateDesc(){
        //$clientes = Client::orderBy('fechaNto','desc')->paginate(5);

        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = Client::where($opcion,'like',session('text'))->orderBy('fechaNto', 'desc')->paginate(5);
        }
        else{
            $clientes = Client::orderBy('fechaNto', 'desc')->paginate(5);
        }
        return view('listClient', ['clientes'=>$clientes]);
    }
    public function buscar(Request $request){
        $text = $request->buscar;
        $text='%'.$text.'%';

        $opcion = $request->opcion;
        //$client;
        //echo "texto".$text;
        session(['opcion'=>$opcion,'text'=>$text]);
        /*if ($opcion=="nombre") {
            $client = Client::where('nombre','like',$text)->paginate(5);
        }
        else{
            $client = Client::where('dni','like',$text)->paginate(5);
        }*/
        $client = Client::where($opcion,'like',$text)->paginate(5);
        //return view('listClient', ['clientes'=>$client])->with('opcion',$opcion)->with('text',$text);
        return view('listClient', ['clientes'=>$client]);
    }

  
}
