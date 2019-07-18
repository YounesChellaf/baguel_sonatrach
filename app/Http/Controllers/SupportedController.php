<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportRequest;
use App\Models\DotationSupport;
use App\Models\Prestation;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class SupportedController extends Controller
{

    public function index(){
        return view('supported.index');
    }
    public function mainView($type){
        switch ($type){
            case 'visitor':
                return view('supported.SupportIndex.Visitor');
            case 'intern-without-imputation':
                return view('supported.SupportIndex.SupportWithoutImputation');
            case 'intern-with-imputation':
                return view('supported.SupportIndex.SupportWithImputation');
            case 'dotation':
                return view('supported.SupportIndex.Dotation');
                break;
        }
    }

    public function createView($type){
        switch ($type){
            case 'visitor':
                return view('supported.SupportType.visitor_support');
            case 'intern-without-imputation':
                return view('supported.SupportType.support_without_imputation');
            case 'intern-with-imputation':
                return view('supported.SupportType.support_with_imputation');
            case 'dotation':
                return view('supported.SupportType.dotation_support');
                break;
        }
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
    public function dotationDetails($id){
        $support =DotationSupport::find($id);
        return view('supported.dotation_details')->with('support',$support);
    }

    public function dotation_affected_employee(Request $request,$id){
        $dotation = DotationSupport::find($id);
        $dotation->employee_id = $request->employee_id;
        $dotation->save();
        return redirect()->route('admin.support.dotation.details',$dotation->id);
    }
    public function support_affected_employee(Request $request,$id){
        $support = Support::find($id);
        $support->employee_id = $request->employee_id;
        $support->save();
        return redirect()->route('admin.support.details',$support->id);
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

    public function exportPDF($id){
        $support = Support::find($id);
        return  PDF::loadView('exports.support.support',['data' => $support]
        )->setPaper('a4', 'portrait')->setWarnings(false)->download('support.pdf');
    }
}
