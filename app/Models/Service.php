<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    function  direction(){
        return $this->belongsTo('App\Models\Division', 'division_id', 'id');
    }
}
