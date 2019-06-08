<?php

namespace App\Models;

use App\EquipementInstance;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    protected $guarded = [];

    public static function IsUnique($type, $marque)
    {

        return Equipement::where('type',$type  &&  'marque',$marque )->count() == 0;
    }

    function instance(){
        return $this->hasMany(EquipementInstance::class);
    }

}
