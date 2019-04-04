<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    function  departement(){
        return $this->belongsTo('App\Direction');
    }
}
