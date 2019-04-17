<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DatabaseNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
  use Notifiable;
  use LogsActivity;
  use CausesActivity;

  protected static $logAttributes = ['firstName', 'lastName', 'email', 'username', 'account_type'];

  protected $guarded = [];
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  function room(){
      return $this->hasMany('App\Models\Room');
  }
  function visit(){
      return $this->hasMany('App\Models\Visit');
  }

  public function name(){
    return $this->firstName.' '.$this->lastName;
  }

  public function structure(){
    if($this->LifeBase){
      return 'Base de vie: '.$this->LifeBase->name;
    }elseif($this->Administration){
      return 'Administration: '.$this->Administration->name;
    }else{
      return '#';
    }
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
        return 'Employé Sonatrach';
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
        'lifebase_id' => $request->lifebase_id,
        'administration_id' => $request->administration_id,
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
    return $this->belongsTo('App\Models\Service');
  }

  public function LifeBase(){
    return $this->belongsTo('App\Models\LifeBase', 'lifebase_id', 'id');
  }

  public function Administration(){
    return $this->belongsTo('App\Models\Administration', 'administration_id', 'id');
  }

  public function notifications(){
      return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('created_at', 'desc');
  }

}
