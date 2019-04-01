<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
class PackagesController extends Controller
{
    //
    public function showPackages(){
        $packages = Package::paginate(5);
        return view('packages',array ('packages'=> $packages));
    }
}
