<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller{

    public function index(){
      return view('projects.index');
    }

    public function create(Request $request){
      if($request->post()){
        Project::new($request);
        return back();
      }
    }

}
