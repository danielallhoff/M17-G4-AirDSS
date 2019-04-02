<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Flight;

class TicketsController extends Controller
{
    //
    public function showTickets(){
        $tickets = Ticket::paginate(10);
        return view('tickets',array ('tickets'=> $tickets)) ;
    }

    //Ordenar Tickets por clase descendente
    public function orderTicketsClaseDesc (){
        $tickets = Ticket::orderBy('clase','desc')->paginate(10);
        return view('tickets', ['tickets'=>$tickets]);
    }

    //Ordenar Tickets por clase ascendente
    public function orderTicketsClaseAsc (){
        $tickets = Ticket::orderBy('clase','asc')->paginate(10);
        return view('tickets', ['tickets'=>$tickets]);
    }

    //Ordenar por Codigo ascendente
    public function orderTicketsCodAsc (){
        $tickets = Ticket::orderBy('codigo','asc')->paginate(10);
        return view('tickets', ['tickets'=>$tickets]);
    }

    //Ordenar por Codigo descendente
    public function orderTicketsCodDesc (){
        $tickets = Ticket::orderBy('codigo','desc')->paginate(10);
        return view('tickets', ['tickets'=>$tickets]);
    }


    public function showLogin() {
        return view('loginUser');
    }
}
