<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\NewSupplierRequest;
class SupplierController extends Controller
{
  public function index(){
    return view('suppliers.index');
  }

  public function createView(){
    return view('suppliers.create');
  }

  public function createPost(NewSupplierRequest $request){
    if($request->post()){
      $validated = $request->validated();
      $supplier = Supplier::new($request);
      return redirect(route('admin.suppliers.index'));
    }
  }

  public function editView($supplier_id = null){
    if(!$supplier_id){
      abort(404);
    }
    $supplier = Supplier::find($supplier_id);
    if(!$supplier){
      abort(404);
    }
    return view('suppliers.edit', [
      'supplier' => $supplier,
    ]);
  }

  public function editPost(Request $request){
    if($request->post()){
      Supplier::handleUpdate($request);
      return redirect(route('admin.suppliers.index'));
    }
  }

  public function deleteSupplier(Request $request){
    if($request->post()){
      $response = array();
      $supplier = Supplier::find($request->supplierId);
      $password = $request->userPassword;
      $currentUser = Auth::user();
      if(Hash::check($password, $currentUser->password)){
        if(!$supplier){
          $response['status'] = 404;
          $response['msg'] = "Le fournisseur que vous essayé de supprimé n'existe pas";
        }else{
          $response['msg'] = "Le fournisseur ". $supplier->name ." a été bien supprimé";
          $supplier->delete();
          $response['status'] = 200;
        }
      }else{
        $response['status'] = 500;
        $response['msg'] = "Le mot de passe que vous avez présenter est incorrecte!";
      }
      echo json_encode($response);
    }
  }
}
