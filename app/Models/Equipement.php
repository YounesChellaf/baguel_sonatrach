<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    protected $fillable = ['reference','status','room_id'];

    function room(){
        return $this->belongsTo('App\Models\Room');
    }
}
