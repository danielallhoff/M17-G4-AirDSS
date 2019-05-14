<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProfileController extends Controller
{
    public function show(){
        $cliente = User::findOrFail(1);
        return view('profile', array('cliente' => $cliente));
    }
}
