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
    function reservation(){
        return $this->hasMany(Reservation::class);
    }
    function planning(){
        return $this->hasMany(Planning::class);
    }

    public function reserved(){
        switch ($this->reserved) {
            case false:
                echo '<label class="label label-success">Libre</label>';
                break;

            case true:
                echo '<label class="label label-danger">Occupé</label>';
                break;
            default:
                // code...
                break;
        }
    }

}
