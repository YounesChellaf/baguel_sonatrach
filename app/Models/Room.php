<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable=['number','bloc_id','user_id'];
    function bloc(){
        return $this->belongsTo('App\Models\Bloc');
    }
    function user(){
        return $this->belongsTo('App\Models\User');
    }
    function equipement(){
        return $this->hasMany('App\Models\Equipement');
    }
}
