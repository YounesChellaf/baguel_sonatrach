<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Illuminate\Http\Request;

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
}
