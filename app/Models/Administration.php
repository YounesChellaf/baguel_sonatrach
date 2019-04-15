<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    protected $guarded = [];

    public static function new($request){
      if($request->post()){
        Administration::create([
          'name' => $request->admin_name,
          'address' => $request->admin_address,
        ]);
      }
    }
}
