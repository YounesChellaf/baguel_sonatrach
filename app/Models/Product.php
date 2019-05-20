<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $guarded = [];

  public function support(){
      return $this->belongsToMany(Support::class,'product_support');
  }
  public function prestation(){
      return $this->belongsTo(Prestation::class);
  }

  public static function new($request){
    if($request->post()){
      Product::create([
        'name' => $request->ProductName,
        'unit_price' => $request->ProductUnitPrice,
        'category' => $request->productCategory,
      ]);
    }
  }

  public function category(){
    switch ($this->category) {
      case 'food':
      return "Nourriture";
      break;
      case 'supplies':
      return "Provisions";
      break;
      case 'maintenance':
      return 'Maintenance';
      break;
      default:
      return '#';
      break;
    }
  }
}
