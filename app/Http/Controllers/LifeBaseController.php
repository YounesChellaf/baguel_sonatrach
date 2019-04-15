<?php

namespace App\Http\Controllers;

use App\Models\LifeBase;
use Illuminate\Http\Request;

class LifeBaseController extends Controller{
  public function save(Request $request){
    if($request->post()){
      LifeBase::new($request);
      return back();
    }
  }
}
