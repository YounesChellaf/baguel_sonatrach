<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use Illuminate\Http\Request;

class AdministrationController extends Controller{
  public function save(Request $request){
    if($request->post()){
      Administration::new($request);
      return back();
    }
  }
}
