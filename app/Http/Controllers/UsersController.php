<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\NewUserRequest;
use ReverseRegex\Lexer;
use ReverseRegex\Random\SimpleRandom;
use ReverseRegex\Parser;
use ReverseRegex\Generator\Scope;
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

  }

  public function deleteUser(Request $request){
    if($request->post()){
      $user = User::find($request->userId);
      if(!$user){
        abort(404);
      }
      $user->delete();
      echo json_encode('deleted');
    }
  }
}
