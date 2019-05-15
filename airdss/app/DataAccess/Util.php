<?php

namespace App\DataAccess;

use App\Flight;

class Util
{
    static public function cancelarVuelo($id)
    {
        $flight = Flight::findOrFail($id);

        $flight->cancelado = 1;
        $flight->save();
    }
}