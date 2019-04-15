<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $guarded = [];
    function visitor(){
        return $this->hasMany('App\Models\Visitor');
    }
}
