<?php

namespace App\Http\Controllers;

use App\Models\NotationCriteria;
use Illuminate\Http\Request;

class NotationCriteriaController extends Controller
{
    public function save(Request $request, $notation_type = null){
      if(!$notation_type){
        abort(404);
      }
      if($request->post()){
        NotationCriteria::new($request, $notation_type);
        return back();
      }
    }
}
