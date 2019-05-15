<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Ticket;
use App\DataAccess\PackageDataAccess as P;

class PackagesController extends Controller
{
    //Mostrar todos los paquetes
    public function showPackages(){
        $packages = P::showPackages();
        return view('listPackages',array ('packages'=> $packages));
    }
    public function removePackage($id){
        P::removePackage($id);
        return back();
    }
    //Mostar packages relacionados con un ticket
    public function showTicketPackages($id) {
        $result = P::showTicketPackages($id);
        return view('packages',array ('ticket' => $result[0], 'packages'=> $result[1]));
    }

    //Ordenar por PESO ascendente
    public function orderPackagesPesoAsc ($id){
        $result = P::orderPackagesPesoAsc($id);
        return view('packages', ['ticket' => $result[0], 'packages'=>$result[1]]);
    }
    //Ordenar por PESO descendente
    public function orderPackagesPesoDesc ($id){
        $result = P::orderPackagesPesoDesc($id);
        return view('packages', ['ticket' => $result[0], 'packages'=>$result[1]]);
    }
}
