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

  public function name(){
    return $this->firstName.' '.$this->lastName;
  }

  public static function getSecuredPassword(){

  }

  public static function getUniqueUsername(Request $request){

  }

  public static function new(Request $request){
    if($request->post()){
      $user = User::create([
        'firstName' => $request->firstName,
        'lastName' => $request->lastName,
        'email' => $request->email,
        'username' => strtolower($request->username),
        'password' => Hash::make($request->password),
      ]);
      return $user;
    }
  }

}
