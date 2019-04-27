<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitRequest;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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

    public function aprouve($id){
        $visit = Visit::find($id);
        $visit->status = 'approved';
        $visit->save();
        return redirect()->back();

    }
    public  function  reject($id){
        $visit = Visit::find($id);
        $visit->status = 'rejected';
        $visit->save();
        return redirect()->back();
    }
}
