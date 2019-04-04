<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientController extends Controller
{
    public $nombre;

    //ListarCliente-------------------------------------------------------------------
    public function showClients(){
        if(session()->has('opcion')){
            session()->forget('opcion','text');
        }

        $clientes = Client::paginate(5);
        return view('listClient',array ('clientes'=> $clientes)) ;
    }
    //---------------------------------------------------------------------------------

    //OrdenarClientes------------------------------------------------------------------
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
    //---------------------------------------------------------------------------------

    //Buscar Cliente ------------------------------------------------------------------
    public function buscar(Request $request){
        $text = $request->buscar;
        $text='%'.$text.'%';

        $opcion = $request->opcion;

        session(['opcion'=>$opcion,'text'=>$text]);

        $client = Client::where($opcion,'like',$text)->paginate(5);
        return view('listClient', ['clientes'=>$client]);
    }
    //---------------------------------------------------------------------------------

    //Eliminar CLiente-----------------------------------------------------------------

    public function deleteClient($id){
        $cliente = Client::findOrFail($id);
        $cliente->delete();

        if(session()->has('opcion')){
            //return redirect()->action('ClientController@buscar')->withInput();
            $clientes = Client::paginate(5);
            return view('listClient',array ('clientes'=> $clientes)) ;
        }
        else{
            //return redirect()->action('ClientController@showClients');
            return back();
        }
    }
    //---------------------------------------------------------------------------------

    //|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    //CreateClient---------------------------------------------------------------------

    public function createClient(){

        return view('createClient');
    }

    public function saveClient(Request $request){

       /* $cliente = new Client([
                'dni'=>$request->dni,
                'nombre'=>$request->nombre,
                'apellidos'=>$request->apellidos,
                'telefono'=>$request->telefono,
                'email'=>$request->email,
                'fechaNto'=>$request->fecha
        ]);*/
        $this->validate($request, [
            'dni'=>'required|alpha_dash|size:9',
            'nombre'=>'required|alpha',
            'apellidos'=>'required|alpha',
            'telefono'=>'required|numeric|min:99999999',    //con size:9 no iba
            'email'=>'required|email',
            'fecha'=>'required|date',
            ]);


        $cliente= new Client();
        $cliente->dni=$request->dni;
        $cliente->nombre= $request->nombre;
        $cliente->apellidos= $request->apellidos;
        $cliente->telefono=$request->telefono;
        $cliente->email=$request->email;
        $cliente->fechaNto=$request->fecha;

        $cliente->save();
        return view('airdss');
    }
    
    //---------------------------------------------------------------------------------
}
