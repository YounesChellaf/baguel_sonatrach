<?php

namespace App\Models;

use App\EquipementInstance;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    protected $guarded = [];

    function instance(){
        return $this->hasMany(EquipementInstance::class);
    }

}
