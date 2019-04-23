<?php

namespace App\Http\Controllers;

use App\Models\Notation;
use Illuminate\Http\Request;

class NotationController extends Controller
{

  public function index(){
    $kitchenNotationsCount = Notation::where('type', 'kitchen')->count();
    $receptionNotationsCount = Notation::where('type', 'reception')->count();
    $storageNotationsCount = Notation::where('type', 'storage')->count();
    $restaurantNotationsCount = Notation::where('type', 'restaurant')->count();
    $supplierNotationsCount = Notation::where('type', 'supplier')->count();
    $roomNotationsCount = Notation::where('type', 'room')->count();
    $laundryNotationsCount = Notation::where('type', 'laundry')->count();
    $officeNotationsCount = Notation::where('type', 'office')->count();
    return view('notations.index', [
      'kitchenNotationsCount' => $kitchenNotationsCount,
      'receptionNotationsCount' => $receptionNotationsCount,
      'storageNotationsCount' => $storageNotationsCount,
      'restaurantNotationsCount' => $restaurantNotationsCount,
      'supplierNotationsCount' => $supplierNotationsCount,
      'roomNotationsCount' => $roomNotationsCount,
      'laundryNotationsCount' => $laundryNotationsCount,
      'officeNotationsCount' => $officeNotationsCount,
    ]);
  }

  public function indexPerType($notation_type = null){
    if(!$notation_type){
      abort(404);
    }
    $Controls = Notation::where('type', $notation_type)->get();
    return view('notations.categories.'.$notation_type.'.index', [
      'controls' => $Controls,
    ]);
  }

  public function createPerType($notation_type = null){
    if(!$notation_type){
      abort(404);
    }
    return view('notations.categories.'.$notation_type.'.create');
  }

  public function save(Request $request, $type = null){
    if($request->post()){
      if(!$type){
        abort(404);
      }
      Notation::new($request);
      return redirect(route('admin.notations.index.type', $type));
    }
  }


  public function viewControl($ref = null){
    if(!$ref){
      abort(404);
    }
    $notation = Notation::where('ref', $ref)->first();
    if(!$notation){
      abort(404);
    }
    return view('notations.categories.'.$notation->type.'.display', [
      'notation' => $notation,
    ]);
  }
}
