<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    protected $fillable =['name','number','type','floors_number','active'];

    function office(){
        return $this->hasMany('App\Office');
    }
}