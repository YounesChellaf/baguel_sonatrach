<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    protected $fillable =['name','number','type','floors_number','active'];

    function office(){
        return $this->hasMany('App\Office');
    }
    function room(){
        return $this->hasMany('App\Room');
    }
}
