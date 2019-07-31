<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Bloc extends Model
{
    protected $guarded = [];

    public static function IsUnique($designation = null)
    {
        if ($designation) {
            return Bloc::where('designation', $designation)->count() == 0;
        }
    }


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
    public static function new(Request $request){
        if ($request->post()){
            $bloc =Bloc::create([
                'name' =>$request->name,
                'number' =>$request->number,
                'classe' =>$request->classe,
                'type' =>$request->type,
            ]);
        }
        return $bloc;
    }
}
