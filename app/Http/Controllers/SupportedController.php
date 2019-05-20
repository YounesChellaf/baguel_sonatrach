<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportedController extends Controller
{

    public function index(){
        /*if(Auth::user()->id ==1){
            return view('supported.index2');
        }
        return view('supported.index');*/
        if(Auth::user()->id !=1){
            return view('supported.index2');
        }
        return view('supported.index');
    }
    public function createView($type){
        return view('supported.AddSupport')->with('type',$type);
    }
    public function store(Request $request){
        if ($request->post()){
            $support=Support::new($request);
            return redirect()->route('admin.support.index');
        }
    }

    public function detailsView($id){
        $support =Support::find($id);
        return view('supported.support_details')->with('support',$support);
    }
    public function aprouve($id){
        $support = Support::find($id);
        $support->status = 'approved';
        $support->save();
        return redirect()->back();

    }
    public  function  reject($id){
        $support = Support::find($id);
        $support->status = 'rejected';
        $support->save();
        return redirect()->back();
    }
    public function affect($id){
        $prestation = Prestation::find($id);
        return view('supported.affect')->with('prestation',$prestation);
    }
}