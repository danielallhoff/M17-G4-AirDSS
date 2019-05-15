<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\DataAccess\UserDataAccess as U;

class ClientController extends Controller
{

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
        $result = U::deleteClient($id);

        if($result[0] == 1){
            //return redirect()->action('ClientController@buscar')->withInput();
            return view('client.listClient',array ('clientes'=> $result[1])) ;
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

        U::saveClient($request);

        return view('adminIndex');
    }
    
    //---------------------------------------------------------------------------------


    //Modificar cliente----------------------------------------------------------------
    public function modify($id){
        $cliente = U::modify($id);
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
        
        U::edit($request);
        //return view('editClient',['cliente'=>$cliente]);
        
        //return view('listClient');
        return redirect()->action('ClientController@showClients');
    }

}
