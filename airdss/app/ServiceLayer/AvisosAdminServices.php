<?php

namespace App\ServiceLayer;

use App\DataAccess\Util;
use App\DataAccess\FlightDataAccess as F;
use Illuminate\Support\Facades\Log;

class AvisosAdminServices
{
    // función que cancela un vuelo aleatoriamente
    static public function notificarCancelacionAvion()
    {
        
        $max = F::totalVuelos();
        $id = rand(1,$max);
        Util::cancelarVuelo($id);
        Log::Debug("Se ha cancelado el vuelo" . $id);
    } 
}