<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    protected $guarded = [];

    function office(){
        return $this->hasMany('App\Models\Office');
    }
    function room(){
        return $this->hasMany('App\Models\Room');
    }
}
