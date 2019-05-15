<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataAccess\UserDataAccess as U;


class ProfileController extends Controller
{
    public function show($id){
        $cliente = U::showProfile($id);
        return view('profile', array('cliente' => $cliente));
    }
}
