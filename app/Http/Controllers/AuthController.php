<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\NewPasswordRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AuthController extends Controller
{
  use AuthenticatesUsers;

  public function loginView(){
    return view('auth.login');
  }

  public function setPassword(){
    return view('auth.setPassword');
  }

  public function setPasswordPost(NewPasswordRequest $request){
    if($request->post()){
      $validator = $request->validated();
      Auth::user()->setNewPassword($request);
      Auth::logout();
      return redirect(route('auth.login.view'));
    }
  }

  public function loginHandle(Request $request){
    $credentials = $request->only('username', 'password');
    $user = User::where('username', $request->username)->first();
    if(!$user){
      abort(404);
    }else{
      if(!$user->password){
        Auth::login($user);
        return redirect(route('auth.setPassword'));
      }
    }
    if (Auth::attempt($credentials)){
      return redirect()->intended();
    }else{
      return back()->with('wrong_credentials', 'wrong_username_or_password');
    }
  }

  public function handleLogout(){
    if(Auth::user()){
      Auth::user()->setLastConnexionDate();
      Auth::logout();
      return redirect(route('auth.login.view'));
    }
  }
}
