<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plane;

class PlanesController extends Controller
{
    public function show()
    {
        $planes = Plane::all();
        return view('planes', ['planes' => $planes]);
    }
}
