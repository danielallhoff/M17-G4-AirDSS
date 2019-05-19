<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardingPass extends Model
{

    protected $fillable = ['asiento', 'puerta', 'fecha', 'embarque', 'llegada'];
    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

    public function flight()
    {
        return $this->belongsTo('App\Flight');
    }
}