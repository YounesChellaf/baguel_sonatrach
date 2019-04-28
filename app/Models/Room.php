<?php

namespace App\Models;

use App\Models\EquipementInstance;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $guarded = [];

    function bloc(){
        return $this->belongsTo(Bloc::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
    function instance(){
        return $this->hasMany(EquipementInstance::class);
    }
}
