<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AuthController extends Controller
{
  use AuthenticatesUsers;

  public function loginView(){
    return view('auth.login');
  }

  public function loginHandle(Request $request){
    $credentials = $request->only('username', 'password');
    if (Auth::attempt($credentials)) {
      return redirect()->intended();
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
