<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showIndex()
    {
        return view('adminIndex');
    }
}
