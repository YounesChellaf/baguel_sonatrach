<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitRequest;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index(){
        return view('programmed_visit.index');
    }
    public function createView(){
      return view('programmed_visit.AddVisit');
    }

    public  function store(Request $request){
        if ($request->post()){
            //$validated = $request->validated();
            $visit = Visit::new($request);
            return redirect()->back();
        }
    }
}
