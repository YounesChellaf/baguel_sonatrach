<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  protected $guarded = [];
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];


  public static function getSecuredPassword(){

  }

  public static function getUniqueUsername(Request $request){

  }

  public static function new(Request $request){
    if($request->post()){
      $user = User::create([
        'username' => strtolower($request->username),
        'password' => Hash::make($request->password),
        'name' => $request->username,
      ]);

      return $user;
    }
  }

}
