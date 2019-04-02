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
}
