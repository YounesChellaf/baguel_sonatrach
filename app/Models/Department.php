<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $fillable =['name','active','direction_id'];
    function  direction(){
        return $this->belongsTo('App\Models\Direction');
    }
    //
}
