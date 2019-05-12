<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Client;
use Illuminate\Support\Facades\Auth;
use App\User;

class ClientController extends Controller
{
    public $nombre;

    //ListarCliente-------------------------------------------------------------------
    public function showClients(){
        if(session()->has('opcion')){
            session()->forget('opcion','text');
        }

        $clientes = User::paginate(5);
        return view('listClient',array ('clientes'=> $clientes)) ;
        //Falta añadir que no muestre los usuarios admin
    }
    //---------------------------------------------------------------------------------

    //OrdenarClientes------------------------------------------------------------------
    public function orderClientNameAsc(){
        //$clientes = User::orderBy('nombre', 'asc')->paginate(5);

        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where($opcion,'like',session('text'))->orderBy('name', 'asc')->paginate(5);
        }
        else{
            $clientes = User::orderBy('name', 'asc')->paginate(5);
        }
        
        return view('listClient' ,['clientes'=>$clientes]);
    }
    public function orderClientNameDesc(){
        //echo "ordenando por ".session('opcion') .", con el texto ".session('text');
        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where($opcion,'like',session('text'))->orderBy('name', 'desc')->paginate(5);
        }
        else{
            $clientes = User::orderBy('name', 'desc')->paginate(5);
        }
        
        return view('listClient' ,['clientes'=>$clientes]);
    }
    public function orderClientDateAsc(){
        //$clientes = User::orderBy('fechaNto','asc')->paginate(5);

        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where($opcion,'like',session('text'))->orderBy('fechaNto', 'asc')->paginate(5);
        }
        else{
            $clientes = User::orderBy('fechaNto', 'asc')->paginate(5);
        }
        return view('listClient', ['clientes'=>$clientes]);
    }
    public function orderClientDateDesc(){
        //$clientes = User::orderBy('fechaNto','desc')->paginate(5);

        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where($opcion,'like',session('text'))->orderBy('fechaNto', 'desc')->paginate(5);
        }
        else{
            $clientes = User::orderBy('fechaNto', 'desc')->paginate(5);
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

        $client = User::where($opcion,'like',$text)->paginate(5);
        return view('listClient', ['clientes'=>$client]);
    }
    //---------------------------------------------------------------------------------

    //Eliminar CLiente-----------------------------------------------------------------

    public function deleteClient($id){
        $cliente = User::findOrFail($id);
        $cliente->delete();

        if(session()->has('opcion')){
            //return redirect()->action('ClientController@buscar')->withInput();
            $clientes = User::paginate(5);
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
            'name'=>'required|',
            'apellidos'=>'required|',
            'telefono'=>'required|numeric|min:99999999',    //con size:9 no iba
            'email'=>'required|email',
            'fecha'=>'required|date',
            ]);


        $cliente= new Client();
        $cliente->dni=$request->dni;
        $cliente->name= $request->name;
        $cliente->apellidos= $request->apellidos;
        $cliente->telefono=$request->telefono;
        $cliente->email=$request->email;
        $cliente->fechaNto=$request->fecha;

        $cliente->save();
        return view('adminIndex');
    }
    
    //---------------------------------------------------------------------------------


    //Modificar cliente----------------------------------------------------------------
    public function modify($id){
        $cliente = User::findOrFail($id);
        return view('editClient',['cliente'=>$cliente]);
    }
    public function edit(Request $request){


        $this->validate($request, [
            'dni'=>'required|alpha_dash|size:9',
            'name'=>'required|',
            'apellidos'=>'required|',
            'telefono'=>'required|numeric|min:99999999',    //con size:9 no iba
            'email'=>'required|email',
            'fecha'=>'required|date',
            ]);
        $cliente = User::findOrFail($request->id);
        
        $cliente->dni=$request->dni;
        $cliente->name= $request->name;
        $cliente->apellidos= $request->apellidos;
        $cliente->telefono=$request->telefono;
        $cliente->email=$request->email;
        $cliente->fechaNto=$request->fecha;

        $cliente->save();
        //return view('editClient',['cliente'=>$cliente]);
        
        //return view('listClient');
        return redirect()->action('ClientController@showClients');
    }

}
