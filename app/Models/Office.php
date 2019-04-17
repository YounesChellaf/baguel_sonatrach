<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $guarded = [];

    function bloc(){
        return $this->belongsTo('App\Models\Bloc');
    }
}
