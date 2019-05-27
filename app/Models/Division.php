<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $guarded = [];

    function  departement(){
        return $this->hasMany('App\Models\Service');
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($division) { // before delete() method call this
            $division->departement()->delete();
            // do the rest of the cleanup...
        });
    }
}
