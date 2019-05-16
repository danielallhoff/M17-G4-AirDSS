<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataAccess\UserDataAccess as U;
use Illuminate\Support\Facades\Auth; // Para poder usar Auth::



class ProfileController extends Controller
{
    public function show($id){
        if(Auth::user()->id==$id){
            $cliente = U::showProfile($id);
            return view('profile', array('cliente' => $cliente));
        }
        else{
            return redirect()->action('InicioController@inicio');;
        }

    }
}
