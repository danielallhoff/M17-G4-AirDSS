<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function ticket() 
    {
        return $this->belongsTo('App\Ticket'); 
    }
}
