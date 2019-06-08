<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $guarded = [];

    public static function IsUnique($number)
    {
        return Office::where('number',$number)->count() == 0;
    }

    function bloc(){
        return $this->belongsTo('App\Models\Bloc');
    }
}
