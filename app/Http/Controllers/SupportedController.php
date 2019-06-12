<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportRequest;
use App\Models\Prestation;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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
    public function store(SupportRequest $request){
        if ($request->post()){
            $validated = $request->validated();
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

    public function exportPDF($id){
        $support = Support::find($id);
        return  PDF::loadView('exports.support.support',['data' => $support]
        )->setPaper('a4', 'portrait')->setWarnings(false)->download('support.pdf');
    }
}
