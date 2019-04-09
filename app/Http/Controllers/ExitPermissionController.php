<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Models\ExitPermission;
use App\Http\Requests\NewExitPermissionRequest;
class ExitPermissionController extends Controller{


    public function index(){
      $exitPermissions = ExitPermission::all();
      return view('exit_permissions.index', [
        'exitPermissions' => $exitPermissions,
      ]);
    }

    public function createView(){
      return view('exit_permissions.create');
    }

    public function createPost(NewExitPermissionRequest $request){
      if($request->post()){
        $validated = $request->validated();
        $exitPermission = ExitPermission::new($request);
        return redirect(route('admin.ExitPermissions.index'));
      }
    }

    public function approve(Request $request){
      if($request->post()){
        $response = array();
        $exitPermission = ExitPermission::where('ref', $request->permissionRef)->first();
        $password = $request->userPassword;
        $currentUser = Auth::user();
        if(Hash::check($password, $currentUser->password)){
          if(!$exitPermission){
            $response['status'] = 404;
            $response['msg'] = "Le bon de sortie que vous essayé d'approuvé n'existe pas";
          }else{
            $response['msg'] = "Le bon de sortie ". $exitPermission->ref ." a été bien approuvé";
            $exitPermission->approve();
            $response['status'] = 200;
          }
        }else{
          $response['status'] = 500;
          $response['msg'] = "Le mot de passe que vous avez présenter est incorrecte!";
        }
        echo json_encode($response);
      }
    }

    public function reject(Request $request){
      if($request->post()){
        $response = array();
        $exitPermission = ExitPermission::where('ref', $request->permissionRef)->first();
        $password = $request->userPassword;
        $currentUser = Auth::user();
        if(Hash::check($password, $currentUser->password)){
          if(!$exitPermission){
            $response['status'] = 404;
            $response['msg'] = "Le bon de sortie que vous essayé de rejeté n'existe pas";
          }else{
            $response['msg'] = "Le bon de sortie ". $exitPermission->ref ." a été bien rejeté";
            $exitPermission->reject();
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
