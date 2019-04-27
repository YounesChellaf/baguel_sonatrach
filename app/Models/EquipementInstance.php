<?php

namespace App\Models;

use App\Models\Equipement;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;

class EquipementInstance extends Model
{
    //
    protected $guarded=[];

    function equipement(){
        return $this->belongsTo(Equipement::class);
    }
    function room(){
        return $this->belongsTo(Room::class);
    }
}
