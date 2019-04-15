<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index(){
        return view('programmed_visit.index');
    }
    public function createView(){
      return view('programmed_visit.AddVisit');
    }
}
