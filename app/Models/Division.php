<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $guarded = [];

    function  departement(){
        return $this->hasMany('App\Models\Service');
    }
}
