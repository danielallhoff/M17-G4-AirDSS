<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardingPass extends Model
{
    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

    public function flight()
    {
        return $this->belongsTo('App\Flight');
    }
}