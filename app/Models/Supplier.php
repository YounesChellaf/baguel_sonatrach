<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
class Supplier extends Model{
  protected $guarded = [];

  public static function getSuppliers(){
    return Supplier::where('parent_id', false)->get();
  }

  public static function new($request, $parent_id = null){
    if($request->post()){
      if($parent_id){
        $parentSupplier = Supplier::find($parent_id);
        if(!$parentSupplier){
          abort(404);
        }
      }
      $supplier = Supplier::create([
        'name' => $request->supplierName,
        'comments' => $request->comments,
        'display_name' => $request->supplierDisplayName,
        'email' => $request->email,
        'phone' => $request->phone,
        'mobile' => $request->mobile,
        'street' => $request->address,
        'created_by' => Auth::user()->id,
        'parent_id' => $parent_id,
      ]);
    }
  }

  public static function handleUpdate($request){
    if($request->post()){
      $supplier = Supplier::find($request->supplierId);
      if(!$supplier){
        abort(404);
      }
      $supplier->name = $request->supplierName;
      $supplier->display_name = $request->supplierDisplayName;
      $supplier->email = $request->email;
      $supplier->phone = $request->phone;
      $supplier->mobile = $request->mobile;
      $supplier->street = $request->address;
      $supplier->comments = $request->comments;
      $supplier->last_update_by = Auth::user()->id;
      $supplier->save();
    }
  }

  public static function subSuppliersList(){
    return Supplier::where('parent_id', '!=' ,null)->get();
  }

  public function CreatedBy(){
    return $this->belongsTo('App\Models\User', 'created_by', 'id');
  }

  public function LastUpdateBy(){
    return $this->belongsTo('App\Models\User', 'last_update_by', 'id');
  }

  public function subSuppliers(){
    return $this->hasMany('App\Models\Supplier', 'parent_id', 'id');
  }

  public function parent(){
    return $this->belongsTo('App\Models\Supplier', 'parent_id', 'id');
  }


}
