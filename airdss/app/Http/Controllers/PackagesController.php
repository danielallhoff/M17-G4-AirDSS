<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Ticket;
class PackagesController extends Controller
{
    //Mostrar todos los paquetes
    public function showPackages(){
        $packages = Package::paginate(5);
        return view('packages',array ('packages'=> $packages));
    }

    //Mostar packages relacionados con un ticket
    public function showTicketPackages($id) {
        $ticket = Ticket::findOrFail($id);
        $packages = $ticket->packages;
        return view('packages',array ('ticket' => $ticket, 'packages'=> $packages));
    }

    //Ordenar por PESO ascendente
    public function orderPackagesPesoAsc ($id){
        $ticket = Ticket::findOrFail($id);
        $packages = Package::where('ticket_id','like',$id)->orderBy('peso','asc')->paginate(10);
        return view('packages', ['ticket' => $ticket, 'packages'=>$packages]);
    }
    //Ordenar por PESO descendente
    public function orderPackagesPesoDesc ($id){
        $ticket = Ticket::findOrFail($id);
        $packages = Package::where('ticket_id','like',$id)->orderBy('peso','desc')->paginate(10);
        return view('packages', ['ticket' => $ticket, 'packages'=>$packages]);
    }
}
