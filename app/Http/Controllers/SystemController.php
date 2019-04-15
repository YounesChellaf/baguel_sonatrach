<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function switchDataSource(Request $request){
      echo json_encode('switched');
    }
}
