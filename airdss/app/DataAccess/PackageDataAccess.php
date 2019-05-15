<?php

namespace App\DataAccess;

use Illuminate\Http\Request;
use App\Package;
use App\Ticket;

class PackageDataAccess
{
    //Mostrar todos los paquetes
    static public function showPackages(){
        $packages = Package::paginate(5);
        return $packages;
    }
    static public function removePackage($id){
        $package = Package::findOrFail($id);
        $package->delete();
    }
    //Mostar packages relacionados con un ticket
    static public function showTicketPackages($id) {
        $ticket = Ticket::findOrFail($id);
        $packages = Package::where('ticket_id','like',$id)->paginate(10);
        return array($ticket, $packages);
    }

    //Ordenar por PESO ascendente
    static public function orderPackagesPesoAsc ($id){
        $ticket = Ticket::findOrFail($id);
        $packages = Package::where('ticket_id','like',$id)->orderBy('peso','asc')->paginate(10);
        return array($ticket, $packages);
    }
    //Ordenar por PESO descendente
    static public function orderPackagesPesoDesc ($id){
        $ticket = Ticket::findOrFail($id);
        $packages = Package::where('ticket_id','like',$id)->orderBy('peso','desc')->paginate(10);
        return array($ticket, $packages);
    }
}
