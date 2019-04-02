<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
{
    //
    public function showTickets(){
        $tickets = Ticket::paginate(5);
        return view('tickets',array ('tickets'=> $tickets)) ;
    }
}
