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

  public function createView(){
    return view('users.create');
  }

  public function getSecuredPassword(){
    echo json_encode(GenerateRandomPassword());
  }

  public function createPost(NewUserRequest $request){
    if($request->post()){
      $validated = $request->validated();
      $user = User::new($request);
      return redirect(route('admin.users.index'));
    }
  }
}
