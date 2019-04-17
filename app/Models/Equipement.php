<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    protected $guarded = [];

    function room(){
        return $this->belongsTo('App\Models\Room');
    }
}
