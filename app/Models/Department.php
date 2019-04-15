<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    function  direction(){
        return $this->belongsTo('App\Models\Direction');
    }
}
