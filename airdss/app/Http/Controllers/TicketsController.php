<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Flight;
use App\User;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function showTickets(){
        $tickets = Ticket::paginate(10);
        return view('tickets',array ('tickets'=> $tickets)) ;
    }

    public function showTicketsfromUser($id){
        $user = User::findOrFail($id);
        $tickets = Ticket::where('user_id','like',$id)->paginate(10);
        return view('tickets',array ('ticket' => $user, 'tickets'=> $tickets));
    }

    public function removeTicket($id){
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return back();
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
