<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Client extends Model
{
    public function tickets(){
        return $this->hasMany('App\Ticket');
    }

    public function edad(){
        $fechaNacimiento = new \DateTime($this->fechaNto);
        return Carbon::now()->diff($fechaNacimiento)->y;
    }
}
