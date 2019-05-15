<?php

namespace App\DataAccess;

use App\BoardingPass;

class BoardingPassDataAccess
{
    public function showBoardingTicket($id)
    {
        $ticket = Ticket::find($id);
        $boardingPasses = $ticket->boardingPasses;
        return array($ticket, $boardingPasses);
    }
}