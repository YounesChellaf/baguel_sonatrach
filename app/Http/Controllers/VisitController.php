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

    public function createInopineView(){
        return view('programmed_visit.AddInopineVisit');
    }

    public  function store(VisitRequest $request){
        if ($request->post()){
            $validated = $request->validated();
            $visit = Visit::new($request);
            return redirect()->route('admin.visits.index');
        }
    }

    public function enterAprouve($id){
        $visit = Visit::find($id);
        if ($visit->status == 'pending' ){
            $visit->status = 'enter_validation';
            $visit->save();
        }
        return redirect()->back();

    }
    public function exitAprouve($id){
        $visit = Visit::find($id);
        if ($visit->status == 'enter_validation' ){
            $visit->status = 'exit_validation';
            $visit->save();
        }
        return redirect()->back();

    }
    public  function  reject($id){
        $visit = Visit::find($id);
        if ($visit->status == 'pending'){
            $visit->status = 'rejected';
            $visit->save();
        }
        return redirect()->back();
    }
}
