<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Flight;
use App\User;
use App\DataAccess\TicketDataAccess as T;

class TicketsController extends Controller
{
    //
    public function showTickets(){
        $tickets = T::showTickets();
        return view('tickets',array ('tickets'=> $tickets));
    }

    public function showTicketsfromUser($id){
        $result = T::showTicketsfromUser($id);
        return view('tickets',array ('ticket' => $result[0], 'tickets'=> $result[1]));
    }

    public function removeTicket($id){
        T::removeTicket($id);
        return back();
    }

    //Ordenar Tickets por clase descendente
    public function orderTicketsClaseDesc ($id){
        $tickets = T::orderTicketsClaseDesc($id);
        return view('tickets', ['tickets'=>$tickets]);
    }

    //Ordenar Tickets por clase ascendente
    public function orderTicketsClaseAsc ($id){
        $tickets = T::orderTicketsClaseAsc($id);
        return view('tickets', ['tickets'=>$tickets]);
    }

    //Ordenar por Codigo ascendente
    public function orderTicketsCodAsc ($id){
        $tickets = T::orderTicketsCodAsc($id);
        return view('tickets', ['tickets'=>$tickets]);
    }

    //Ordenar por Codigo descendente
    public function orderTicketsCodDesc ($id){
        $tickets = T::orderTicketsCodDesc($id);
        return view('tickets', ['tickets'=>$tickets]);
    }

}
