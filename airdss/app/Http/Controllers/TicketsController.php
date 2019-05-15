<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Flight;
use App\User;
use App\DataAccess\TicketDataAccess as T;
use Illuminate\Support\Facades\Auth; // Para poder usar Auth::

class TicketsController extends Controller
{
    //
    public function showTickets(){
        $tickets = T::showTickets();
        return view('tickets.tickets',array ('tickets'=> $tickets));
    }

    //Muestra SOLO los tickets de un usuario que este logueado
    public function showTicketsfromUser($id){
        if(Auth::user()->id == $id){
            $result = T::showTicketsfromUser($id);
            return view('tickets.tickets',array ('ticket' => $result[0], 'tickets'=> $result[1]));
        }else {
            return redirect('/airdss');  
        }
    }

    public function removeTicket($id){
        T::removeTicket($id);
        return back();
    }

    //Ordenar Tickets por clase descendente
    public function orderTicketsClaseDesc ($id){
        if(Auth::user()->id == $id){
            $tickets = T::orderTicketsClaseDesc($id);
            return view('tickets.tickets', ['tickets'=>$tickets]);
        }else {
            return redirect('/airdss');  
        }
    }

    //Ordenar Tickets por clase ascendente
    public function orderTicketsClaseAsc ($id){
        if(Auth::user()->id == $id){
            $tickets = T::orderTicketsClaseAsc($id);
            return view('tickets.tickets', ['tickets'=>$tickets]);
        }else {
            return redirect('/airdss');  
        }
    }

    //Ordenar por Codigo ascendente
    public function orderTicketsCodAsc ($id){
        if(Auth::user()->id == $id){
            $tickets = T::orderTicketsCodAsc($id);
            return view('tickets.tickets', ['tickets'=>$tickets]);
        }else {
            return redirect('/airdss');  
        }
    }

    //Ordenar por Codigo descendente
    public function orderTicketsCodDesc ($id){
        if(Auth::user()->id == $id){
            $tickets = T::orderTicketsCodDesc($id);
            return view('tickets.tickets', ['tickets'=>$tickets]);
        }else {
            return redirect('/airdss');  
        }
    }

}
