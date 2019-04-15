<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $fillable = ['name','address','active'];


    function  departement(){
        return $this->hasMany('App\Models\Department');
    }
}
