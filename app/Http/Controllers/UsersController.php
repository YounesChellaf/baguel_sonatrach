<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\NewUserRequest;
class UsersController extends Controller
{
    public function index(){
      return view('users.index');
    }

    public function createView(){
      return view('users.create');
    }

    public function getSecuredPassword(){
      echo json_encode('thisIsAPassword');
    }

    public function createPost(NewUserRequest $request){
      if($request->post()){
        $validated = $request->validate();
        $user = User::new($request);
        return redirect(route('admin.users.index'));
      }
    }
}
