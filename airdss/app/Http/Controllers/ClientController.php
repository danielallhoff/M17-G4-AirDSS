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
        if(session()->has('opcion')){
            session()->forget('opcion','text');
        }
        $clientes = User::where('esAdmin','0')->paginate(5);
        $cliente = User::findOrFail(1);
        return view('client.listClient',array ('clientes'=> $clientes)) ;
        //Falta añadir que no muestre los usuarios admin
    }
    //---------------------------------------------------------------------------------

    //OrdenarClientes------------------------------------------------------------------
    public function orderClientNameAsc(){
        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where('esAdmin','0')->where($opcion,'like',session('text'))->orderBy('name', 'asc')->paginate(5);
        }
        else{
            $clientes = User::where('esAdmin','0')->orderBy('name', 'asc')->paginate(5);
        }    
        return view('client.listClient' ,['clientes'=>$clientes]);
    }
    public function orderClientNameDesc(){
        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where('esAdmin','0')->where($opcion,'like',session('text'))->where('esAdmin','0')->orderBy('name', 'desc')->paginate(5);
        }
        else{
            $clientes = User::where('esAdmin','0')->orderBy('name', 'desc')->paginate(5);
        }
        return view('client.listClient' ,['clientes'=>$clientes]);
    }
    public function orderClientDateAsc(){
        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where('esAdmin','0')->where($opcion,'like',session('text'))->orderBy('fechaNto', 'asc')->paginate(5);
        }
        else{
            $clientes = User::where('esAdmin','0')->orderBy('fechaNto', 'asc')->paginate(5);
        }
        return view('client.listClient', ['clientes'=>$clientes]);
    }
    public function orderClientDateDesc(){
        $opcion=session('opcion');
        if(session()->has('opcion')){
            $clientes = User::where('esAdmin','0')->where($opcion,'like',session('text'))->orderBy('fechaNto', 'desc')->paginate(5);
        }
        else{
            $clientes = User::where('esAdmin','0')->orderBy('fechaNto', 'desc')->paginate(5);
        }
        return view('client.listClient', ['clientes'=>$clientes]);
    }
    //---------------------------------------------------------------------------------

    //Buscar Cliente ------------------------------------------------------------------
    public function buscar(Request $request){
        $text = $request->buscar;
        $text='%'.$text.'%';

        $opcion = $request->opcion;

        session(['opcion'=>$opcion,'text'=>$text]);

        $client = User::where('esAdmin','0')->where($opcion,'like',$text)->paginate(5);
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

        return view('menu.adminIndex');
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
        if (Auth::check()==0 && Auth::user()->esAdmin == 1){
            return redirect()->action('ClientController@showClients');
        }
        else{
            return redirect()->action('InicioController@inicio');
        }   
    }

}
