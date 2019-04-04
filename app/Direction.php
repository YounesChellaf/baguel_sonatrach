<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $fillable = ['name','address','active'];


    function  departement(){
        return $this->belongsTo('App\Direction');
    }
}
