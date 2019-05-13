<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\BoardingPass;

class BoardingPassController extends Controller
{
    public function showBoardingTicket($id)
    {
        $ticket = Ticket::find($id);
        $boardingPasses = $ticket->boardingPasses;
        return view('boardingPassTicket', array('ticket' => $ticket, 'boardingPasses' => $boardingPasses));
    }
}
