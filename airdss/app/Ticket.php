<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function client() {
        // Product tiene la clave ajena 'category_id'
        return $this->belongsTo('App\client'); 
    }

    public function boardingpasses() {
        return $this->hasMany('App\boardingpass'); 
    }

    public function flight() {
        return $this->belongsTo('App\flight'); 
    }
}
