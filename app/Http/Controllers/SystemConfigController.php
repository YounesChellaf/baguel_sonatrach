<?php

namespace App\Http\Controllers;

use App\Models\SystemConfig;
use Illuminate\Http\Request;

class SystemConfigController extends Controller
{
  public function index(){
    // return view('SystemConfig.index_beta');
    return redirect(route('admin.SystemConfig.subPage', 'lifebase'));
  }

  public function page($page = null){
    if(!$page){
      abort(404);
    }
    if(!$page){
      return redirect(route('admin.SystemConfig.subPage', 'lifebase'));
    }
    return view('SystemConfig.index', [
      'page' => $page,
      'active' => $page
    ]);
  }

  public function updateMultiLifeBaseParam(Request $request){
    if($request->post()){
      $response = SystemConfig::handleMultiLBParam($request);
      echo json_encode($response);
    }
  }

  public function save(Request $request){
    if($request->post()){
      SystemConfig::store($request);
      return back();
    }
  }

}
