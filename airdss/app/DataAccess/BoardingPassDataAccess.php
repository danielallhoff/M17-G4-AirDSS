<?php

namespace App\DataAccess;

use App\BoardingPass;
use App\Ticket;

class BoardingPassDataAccess
{
    static public function showBoardingTicket($id)
    {
        $ticket = Ticket::find($id);
        $boardingPasses = $ticket->boardingPasses;
        return array($ticket, $boardingPasses);
    }
}