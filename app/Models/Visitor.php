<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $guarded = [];

    function visit(){
        return $this->hasMany('App\Models\Visit');
    }
}
