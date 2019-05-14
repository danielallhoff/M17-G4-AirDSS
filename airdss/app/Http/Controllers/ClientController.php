<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\DataAccess\UserDataAccess as U;

class ClientController extends Controller
{
    public $nombre;

    //ListarCliente-------------------------------------------------------------------
    public function showClients(){
        $clientes = U::showClients();
        return view('client.listClient',array ('clientes'=> $clientes)) ;
        //Falta añadir que no muestre los usuarios admin
    }
    //---------------------------------------------------------------------------------

    //OrdenarClientes------------------------------------------------------------------
    public function orderClientNameAsc(){
        $clientes = U::orderClientNameAsc();        
        return view('client.listClient' ,['clientes'=>$clientes]);
    }
    public function orderClientNameDesc(){
        $clientes = U::orderClientNameDesc();
        return view('client.listClient' ,['clientes'=>$clientes]);
    }
    public function orderClientDateAsc(){
        $clientes = U::orderClientDateAsc();
        return view('client.listClient', ['clientes'=>$clientes]);
    }
    public function orderClientDateDesc(){
        $clientes = U::orderClientDateDesc();
        return view('client.listClient', ['clientes'=>$clientes]);
    }
    //---------------------------------------------------------------------------------

    //Buscar Cliente ------------------------------------------------------------------
    public function buscar(Request $request){
        $client = U::buscar($request);
        return view('client.listClient', ['clientes'=>$client]);
    }
    //---------------------------------------------------------------------------------

    //Eliminar CLiente-----------------------------------------------------------------

    public function deleteClient($id){
        $cliente = User::findOrFail($id);
        $cliente->delete();

        if(session()->has('opcion')){
            //return redirect()->action('ClientController@buscar')->withInput();
            $clientes = User::where('esAdmin','0')->paginate(5);
            return view('client.listClient',array ('clientes'=> $clientes)) ;
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

        return view('client.createClient');
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
        return view('client.editClient',['cliente'=>$cliente]);
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
