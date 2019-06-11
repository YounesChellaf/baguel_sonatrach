<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $guarded = [];

  function visit(){
      return $this->belongsToMany('App\Models\Visit','employee_visit');
  }

  function reservation(){
      return $this->hasMany(Reservation::class);
  }
    function planning(){
        return $this->hasMany(Planning::class);
    }
  public function name(){
    return $this->first_name . ' ' . $this->last_name;
  }
  public function office(){
      return $this->hasMany(Office::class);
  }

  public function type(){
    switch ($this->type) {
      case 'employee':
      return 'Employée Sonatrach';
      break;

      case 'supplier_staff':
      return 'Employée prestataire';
      break;

      default:
      return '#';
      break;
    }
  }

  public static function IsUnique($emp_number = null){
    if($emp_number){
      return Employee::where('employee_number', $emp_number)->count() == 0;
    }
  }

  public static function new($request){
    if($request->post()){
      return Employee::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'mobile' => $request->mobile,
        'sexe' => $request->sexe,
        'business_address' => $request->address,
        'type' => $request->employee_type,
        'employee_number' => $request->employee_number,
        'service_id' => $request->service_id,
      ]);
    }
  }
}
