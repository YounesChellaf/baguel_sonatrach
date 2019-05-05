<?php

namespace App\Http\Controllers;

use PDF;
use Supplier;
use App\Models\Notation;
use Illuminate\Http\Request;

class NotationController extends Controller
{

  public function index(){
    $kitchenNotationsCount = Notation::where('type', 'kitchen')->count();
    $receptionNotationsCount = Notation::where('type', 'reception')->count();
    $storageNotationsCount = Notation::where('type', 'storage')->count();
    $restaurantNotationsCount = Notation::where('type', 'restaurant')->count();
    $supplierNotationsCount = Notation::where('type', 'supplier')->count();
    $roomNotationsCount = Notation::where('type', 'room')->count();
    $laundryNotationsCount = Notation::where('type', 'laundry')->count();
    $officeNotationsCount = Notation::where('type', 'office')->count();
    return view('notations.index', [
      'kitchenNotationsCount' => $kitchenNotationsCount,
      'receptionNotationsCount' => $receptionNotationsCount,
      'storageNotationsCount' => $storageNotationsCount,
      'restaurantNotationsCount' => $restaurantNotationsCount,
      'supplierNotationsCount' => $supplierNotationsCount,
      'roomNotationsCount' => $roomNotationsCount,
      'laundryNotationsCount' => $laundryNotationsCount,
      'officeNotationsCount' => $officeNotationsCount,
    ]);
  }

  public function indexPerType($notation_type = null){
    if(!$notation_type){
      abort(404);
    }
    $Controls = Notation::where('type', $notation_type)->get();
    return view('notations.categories.'.$notation_type.'.index', [
      'controls' => $Controls,
    ]);
  }

  public function createPerType($notation_type = null){
    if(!$notation_type){
      abort(404);
    }
    $suppliers = null;
    $subSuppliers = null;
    if($notation_type == 'reception'){
      $suppliers = Supplier::where('parent_id', null)->get();
      $subSuppliers = Supplier::subSuppliersList();
    }
    return view('notations.categories.'.$notation_type.'.create', [
      'suppliers' => $suppliers,
      'SubSuppliers' => $subSuppliers,
    ]);
  }

  public function save(Request $request, $type = null){
    if($request->post()){
      if(!$type){
        abort(404);
      }
      Notation::new($request);
      return redirect(route('admin.notations.index.type', $type));
    }
  }


  public function viewControl($ref = null){
    if(!$ref){
      abort(404);
    }
    $notation = Notation::where('ref', $ref)->first();
    if(!$notation){
      abort(404);
    }
    return view('notations.categories.'.$notation->type.'.display', [
      'notation' => $notation,
    ]);
  }

  public function exportNotation($ref, $docType){
    if(!$ref || !$docType){
      abort(404);
    }
    $control = Notation::where('ref', $ref)->first();
    if(!$control){
      abort(404);
    }
    return  PDF::loadView('exports.notations.'.$control->type, [
      'doc' => $control,
      ])->setPaper('a4', 'portrait')->setWarnings(false)->download($ref.'.pdf');

    }
    public function validateNotation(Request $request){
      if($request->get('controlId')){
        $response = array();
        $control = Notation::find((int)$request->get('controlId'));
        $control->validate();
        $response['status'] = 200;
        $response['msg'] = "Le control: ".$control->ref." a été bien validé";
        echo json_encode($response);
      }
    }

    public function rejectNotation(Request $request){
      if($request->get('controlId')){
        $response = array();
        $control = Notation::find((int)$request->get('controlId'));
        $control->reject();
        $response['status'] = 200;
        $response['msg'] = "Le control: ".$control->ref." a été bien rejeté";
        echo json_encode($response);
      }
    }

  }
