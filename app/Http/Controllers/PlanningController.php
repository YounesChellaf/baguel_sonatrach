<?php

namespace App\Http\Controllers;

use App\Imports\PlanningImport;
use App\Models\Planning;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PlanningController extends Controller
{
    public function index(){
        return view('planning.index');
    }
    public function create(){
        return view('planning.create');
    }
    public function store(Request $request){
        if ($request->post()){
            $planning = Planning::new($request);
        }
        return redirect()->route('admin.planning.index');
    }

    public function aprouve($id){
        $planning= Planning::find($id);
        $planning->status = 'approved';
        $planning->save();
        return redirect()->back();

    }
    public  function  reject($id){
        $planning=Planning::find($id);
        $planning->status = 'rejected';
        $planning->save();
        return redirect()->back();
    }
    public function destroy($id){
        Planning::destroy($id);
        return redirect()->route('admin.reservation.index');
    }
    public function updateView($id){
        $planning = Planning::find($id);
        return view('planning.updateView')->with('planning',$planning);
    }
    public function update(Request $request,$id){
        $planning = Planning::find($id);
        $planning->room_id = $request->room_id;
        $planning->employee_id1 = $request->employee_id1;
        $planning->employee_id2 = $request->employee_id2;
        $planning->remark = $request->remark;
        $planning->save();
        return redirect()->route('admin.planning.index');
    }

    public function import(Request $request){
        if($request->post()){
            if($request->file('PlanningFileInput')){
                Excel::import(new PlanningImport, $request->file('PlanningFileInput'));
                return back();
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
}
