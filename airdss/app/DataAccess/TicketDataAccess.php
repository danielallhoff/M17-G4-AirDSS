<?php

namespace App\DataAccess;

use Illuminate\Http\Request;
use App\Ticket;
use App\User;


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

    //Ordenar Tickets por fecha descendente
    static public function orderTicketsfechaDesc ($id){
        $tickets = Ticket::where('user_id','like',$id)->orderBy('fecha','desc')->paginate(10);
        return $tickets;
    }

    //Ordenar Tickets por fecha ascendente
    static public function orderTicketsfechaAsc ($id){
        $tickets = Ticket::where('user_id','like',$id)->orderBy('fecha','asc')->paginate(10);
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