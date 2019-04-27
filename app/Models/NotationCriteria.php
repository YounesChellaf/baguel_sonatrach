<?php

namespace App\Models;

use Auth;
use Str;
use Illuminate\Database\Eloquent\Model;

class NotationCriteria extends Model
{
  protected $guarded = [];

  public static function new($request, $type){
    if($request->post()){
      NotationCriteria::create([
        'criteria_key' => Str::slug($request->criteria_name),
        'criteria_value' => $request->criteria_name,
        'display_name' => $request->criteria_name,
        'criteria_type' => $type,
        'created_by' => Auth::user()->id,
      ]);
    }
  }

  public static function suppliersNoationCriterias(){
    return NotationCriteria::where('criteria_type', 'supplier_notation')->orderBy('created_at', 'asc')->get();
  }

  public static function deliveryNoationCriterias(){
    return NotationCriteria::where('criteria_type', 'delivery_notation')->orderBy('created_at', 'asc')->get();
  }

  public static function kitchenNotationCriterias(){
    return NotationCriteria::where('criteria_type', 'kitchen_notation')->orderBy('created_at', 'asc')->get();
  }

  public static function restaurantNotationCriterias(){
    return NotationCriteria::where('criteria_type', 'restaurant_notation')->orderBy('created_at', 'asc')->get();
  }

  public static function roomsNotationCriterias(){
    return NotationCriteria::where('criteria_type', 'rooms_notation')->orderBy('created_at', 'asc')->get();
  }

  public static function storageNotationCriterias(){
    return NotationCriteria::where('criteria_type', 'storage_notation')->orderBy('created_at', 'asc')->get();
  }

  public static function laundryNotationCriterias(){
    return NotationCriteria::where('criteria_type', 'laundry_notation')->orderBy('created_at', 'asc')->get();
  }

  public static function officeNotationCriterias(){
    return NotationCriteria::where('criteria_type', 'office_notation')->orderBy('created_at', 'asc')->get();
  }
}
