<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
class ProfileController extends Controller
{
    public function show(){
        $cliente = Client::findOrFail(1);
        return view('profile', array('cliente' => $cliente));
    }
}
