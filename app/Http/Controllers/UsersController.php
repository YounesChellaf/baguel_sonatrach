<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\NewUserRequest;
use ReverseRegex\Lexer;
use ReverseRegex\Random\SimpleRandom;
use ReverseRegex\Parser;
use ReverseRegex\Generator\Scope;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
  public function index(){
    return view('users.index');
  }

  public function getSecuredPassword(){
    echo json_encode(GenerateRandomPassword());
  }

  public function createView(){
    return view('users.create');
  }

  public function createPost(NewUserRequest $request){
    if($request->post()){
      $validated = $request->validated();
      $user = User::new($request);
      return redirect(route('admin.users.index'));
    }
  }

  public function editView(Request $request, $user_id = null){
    if(!$user_id){
      abort(404);
    }
    $user = User::find($user_id);
    if(!$user){
      abort(404);
    }
    return view('users.edit', [
      'user' => $user,
    ]);
  }

  public function editPost(Request $request){
    if($request->post()){
      User::handleUserUpdate($request);
      return redirect(route('admin.users.index'));
    }
  }

  public function deleteUser(Request $request){
    if($request->post()){
      $response = array();
      $user = User::find($request->userId);
      //check user password
      $password = $request->userPassword;
      $currentUser = Auth::user();
      if(Hash::check($password, $currentUser->password)){
        if(!$user){
          $response['status'] = 404;
          $response['msg'] = "L'utilisateur que vous essayé de supprimé n'existe pas";
        }else{
          if($request->userId == Auth::user()->id){
            $response['status'] = 500;
            $response['msg'] = "Vous ne pouvez pas supprimé votre compte";
          }else{
            $user->delete();
            $response['status'] = 200;
            $response['msg'] = "L'utilisateur ". $user->name() ." a été bien supprimé";
          }
        }
      }else{
        $response['status'] = 500;
        $response['msg'] = "Le mot de passe que vous avez présenter est incorrecte!";
      }
      echo json_encode($response);
    }
  }
}
