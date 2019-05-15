<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\BoardingPass;
use App\DataAccess\BoardingPassDataAccess as B;

class BoardingPassController extends Controller
{
    public function showBoardingTicket($id)
    {
        $result = B::showBoardingTicket($id);
        return view('boardingPass.boardingPassTicket', array('ticket' => $result[0], 'boardingPasses' => $result[1]));
    }
}
