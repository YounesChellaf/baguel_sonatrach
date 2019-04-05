<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{

    protected $fillable =['name','active','direction_id'];
    function  direction(){
        return $this->belongsTo('App\Direction');
    }
    //
}
