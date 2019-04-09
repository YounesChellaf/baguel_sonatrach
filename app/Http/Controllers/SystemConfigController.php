<?php

namespace App\Http\Controllers;

use App\Models\SystemConfig;
use Illuminate\Http\Request;

class SystemConfigController extends Controller
{
  public function index(){
    return view('SystemConfig.index');
  }

  public function save(Request $request){
    if($request->post()){
      SystemConfig::store($request);
      return back();
    }
  }

}
