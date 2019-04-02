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
        /*function array_sort_by(&$arrIni, $col, $order = SORT_ASC)
        {
            $arrAux = array();
            foreach ($arrIni as $key=> $row)
            {
                $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
                $arrAux[$key] = strtolower($arrAux[$key]);
            }
            array_multisort($arrAux, $order, $arrIni);
        }


        */
        /*$clientes;
        if($opcion=="nombre"){
            $clientes = Client::where('nombre',$text)->orderBy('nombre', 'asc')->paginate(5);
        }
        else if($opcion =="dni"){

        }
        else{
            $clientes = Client::orderBy('nombre', 'asc')->paginate(5);
        }*/
        $clientes = Client::orderBy('nombre', 'asc')->paginate(5);

        /*$clientes = Client::all();
        $aux = array();
        foreach ($clientes as $cliente) {
            $aux[]=$cliente;
        }   
        array_sort_by($aux, 'nombre',$order = SORT_ASC);*/
        //echo gettype($clientes);
        //$clientesM= asort($clientes);
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
    public function buscar(Request $request){
        $text = $request->buscar;
        //$nombre= $request->buscar;
        //$nombre = '%%';
        $opcion = $request->opcion;
        $client;

        if ($opcion=="nombre") {
            $client = Client::where('nombre',$text)->paginate(5);
        }
        else{
            $client = Client::where('dni',$text)->paginate(5);
        }
        //return view('listClient', ['clientes'=>$client])->with('opcion',$opcion)->with('text',$text);
        return view('listClient', ['clientes'=>$client]);
    }

  
}
