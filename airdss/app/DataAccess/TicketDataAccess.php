<?php

namespace App\DataAccess;

use Illuminate\Http\Request;
use App\Ticket;


class TicketDataAccess
{
    static public function showTickets(){
        $tickets = Ticket::paginate(10);
        return $tickets;
    }

    static public function showTicketsfromUser($id){
        $user = User::findOrFail($id);
        $tickets = Ticket::where('user_id','like',$id)->paginate(10);
        return array($user, $tickets);
    }

    static public function removeTicket($id){
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
    }

    //Ordenar Tickets por clase descendente
    static public function orderTicketsClaseDesc ($id){
        $tickets = Ticket::where('user_id','like',$id)->orderBy('clase','desc')->paginate(10);
        return $tickets;
    }

    //Ordenar Tickets por clase ascendente
    static public function orderTicketsClaseAsc ($id){
        $tickets = Ticket::where('user_id','like',$id)->orderBy('clase','asc')->paginate(10);
        return $tickets;
    }

    //Ordenar por Codigo ascendente
    static public function orderTicketsCodAsc ($id){
        $tickets = Ticket::where('user_id','like',$id)->orderBy('codigo','asc')->paginate(10);
        return $tickets;
    }

    //Ordenar por Codigo descendente
    static public function orderTicketsCodDesc ($id){
        $tickets = Ticket::where('user_id','like',$id)->orderBy('codigo','desc')->paginate(10);
        return $tickets;
    }
}