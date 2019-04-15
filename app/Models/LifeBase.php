<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LifeBase extends Model
{
    protected $guarded = [];


    public static function new($request){
      if($request->post()){
        LifeBase::create([
          'name' => $request->lb_name,
          'address' => $request->lb_address,
        ]);
      }
    }
}
