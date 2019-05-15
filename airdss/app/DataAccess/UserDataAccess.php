<?php

namespace App\DataAccess;

use App\User;
use Illuminate\Http\Request;

class UserDataAccess
{

//ProfileController----------
    static public function showProfile(){
        $cliente = User::findOrFail(1);
        return $cliente;
    }

//ClientController----------

    //ListarCliente-------------------------------------------------------------------
    static public function showClients(){
        if(session()->has('opcion')){
            session()->forget('opcion','text');
        }

        $clientes = User::where('esAdmin','0')->paginate(5);
        return $clientes;
    }
    //---------------------------------------------------------------------------------

    //OrdenarClientes------------------------------------------------------------------
    static public function orderClientNameAsc(){
        //$clientes = User::orderBy('nombre', 'asc')->paginate(5);

        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where('esAdmin','0')->where($opcion,'like',session('text'))->orderBy('name', 'asc')->paginate(5);
        }
        else{
            $clientes = User::where('esAdmin','0')->orderBy('name', 'asc')->paginate(5);
        }
        
        return $clientes;
    }
    
    static public function orderClientNameDesc(){
        //echo "ordenando por ".session('opcion') .", con el texto ".session('text');
        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where('esAdmin','0')->where($opcion,'like',session('text'))->where('esAdmin','0')->orderBy('name', 'desc')->paginate(5);
        }
        else{
            $clientes = User::where('esAdmin','0')->orderBy('name', 'desc')->paginate(5);
        }
        
        return $clientes;
    }
    
    static public function orderClientDateAsc(){
        //$clientes = User::orderBy('fechaNto','asc')->paginate(5);

        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where('esAdmin','0')->where($opcion,'like',session('text'))->orderBy('fechaNto', 'asc')->paginate(5);
        }
        else{
            $clientes = User::where('esAdmin','0')->orderBy('fechaNto', 'asc')->paginate(5);
        }
        return $clientes;
    }
    
    static public function orderClientDateDesc(){
        //$clientes = User::orderBy('fechaNto','desc')->paginate(5);

        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where('esAdmin','0')->where($opcion,'like',session('text'))->orderBy('fechaNto', 'desc')->paginate(5);
        }
        else{
            $clientes = User::where('esAdmin','0')->orderBy('fechaNto', 'desc')->paginate(5);
        }
        return $clientes;
    }
    //---------------------------------------------------------------------------------

    //Buscar Cliente ------------------------------------------------------------------
    static public function buscar(Request $request){
        $text = $request->buscar;
        $text='%'.$text.'%';

        $opcion = $request->opcion;

        session(['opcion'=>$opcion,'text'=>$text]);

        $client = User::where('esAdmin','0')->where($opcion,'like',$text)->paginate(5);
        return $client;
    }
    //---------------------------------------------------------------------------------

    //Eliminar CLiente-----------------------------------------------------------------

    static public function deleteClient($id){
        $cliente = User::findOrFail($id);
        $cliente->delete();

        if(session()->has('opcion')){
            //return redirect()->action('ClientController@buscar')->withInput();
            $clientes = User::where('esAdmin','0')->paginate(5);
            return array(1, $clientes);
        }
        else{
            return array(0);
        }
    }
    //---------------------------------------------------------------------------------

    //|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    //CreateClient---------------------------------------------------------------------

    static public function saveClient(Request $request){

        $cliente= new Client();
        $cliente->dni=$request->dni;
        $cliente->name= $request->name;
        $cliente->apellidos= $request->apellidos;
        $cliente->telefono=$request->telefono;
        $cliente->email=$request->email;
        $cliente->fechaNto=$request->fecha;

        $cliente->save();
        
    }
    
    //---------------------------------------------------------------------------------


    //Modificar cliente----------------------------------------------------------------
    static public function modify($id){
        $cliente = User::findOrFail($id);
        return $cliente;
    }
    static public function edit(Request $request){

        $cliente = User::findOrFail($request->id);
        
        $cliente->dni=$request->dni;
        $cliente->name= $request->name;
        $cliente->apellidos= $request->apellidos;
        $cliente->telefono=$request->telefono;
        $cliente->email=$request->email;
        $cliente->fechaNto=$request->fecha;

        $cliente->save();
    }
}