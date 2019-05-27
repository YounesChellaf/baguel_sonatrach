<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    protected $guarded = [];


    function office(){
        return $this->hasMany('App\Models\Office');
    }
    function room(){
        return $this->hasMany('App\Models\Room');
    }
    public static function boot() {
        parent::boot();
        static::deleting(function($bloc) { // before delete() method call this
            $bloc->room()->delete();
            $bloc->office()->delete();
            // do the rest of the cleanup...
        });
    }
}
