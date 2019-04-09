<?php

namespace App\Models;

use Carbon\Carbon;
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

  public function lastConnexionDate(){
    return $this->last_connexion_at;
  }

  public function setLastConnexionDate(){
    $this->last_connexion_at = Carbon::now();
    $this->save();
  }

  public function accountType(){
    switch ($this->account_type) {
      case 'employee':
        return 'Employé Baguel';
      break;

      case 'supplier_staff':
        return 'Employé Prestataire';
      break;

    }
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
        'department_id' => $request->department,
        'account_type' => $request->account_type,
      ]);
      return $user;
    }
  }

  public static function handleUserUpdate(Request $request){
    if($request->post()){
      $user = User::find($request->userId);
      if(!$user){
        abort(404);
      }
      $user->firstName = $request->firstName;
      $user->lastName = $request->lastName;
      $user->email = $request->email;
      $user->department_id = $request->department;
      $user->account_type = $request->account_type;
      $user->save();
    }
  }


  public function Department(){
    return $this->belongsTo('App\Models\Department');
  }

}
