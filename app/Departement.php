<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{

    function  direction(){
        return $this->hasOne('App\Direction');
    }
    //
}
