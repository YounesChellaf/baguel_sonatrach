<?php

namespace App\Http\Controllers;

use App\Models\SystemConfig;
use Illuminate\Http\Request;

class SystemConfigController extends Controller
{
  public function index(){
    return view('SystemConfig.index');
  }

  public function page($page = null){
    if(!$page){
      abort(404);
    }
    switch ($page) {
      case 'exitPermission':
        return view('SystemConfig.index', [
          'page' => 'exitPermission',
          'active' => 'exitPermission'
        ]);
      break;

      case 'lifebase':
        return view('SystemConfig.index', [
          'page' => 'lifebase',
          'active' => 'lifebase'

        ]);
      break;

      case 'administrations':
        return view('SystemConfig.index', [
          'page' => 'administrations',
          'active' => 'administrations'
        ]);
      break;

      }
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
