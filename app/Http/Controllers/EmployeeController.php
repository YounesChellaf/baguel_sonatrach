<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\NewEmployeeCreated;
use App\Http\Requests\NewEmployeeRequest;
class EmployeeController extends Controller{

  public function index(){
    return view('employees.index');
  }

  public function import(Request $request){
    if($request->post()){
      if($request->file('EmployeesFileInput')){
        Excel::import(new EmployeesImport, $request->file('EmployeesFileInput'));
        return back();
      }else{
        abort(404);
      }
    }else{
      abort(404);
    }
  }

  public function createView(){
    return view('employees.create');
  }

  public function createPost(NewEmployeeRequest $request){
    if($request->post()){
      $validated = $request->validated();
      $employee = Employee::new($request);
      Auth::user()->notify(new NewEmployeeCreated($employee));
      return redirect(route('admin.employees.index'));
    }
  }

  public function editEmployee(){

  }

  public function deleteEmployee(Request $request){
    if($request->post()){
      $response = array();
      $employee = Employee::find($request->employeeId);
      //check user password
      if(!$employee){
        $response['status'] = 404;
        $response['msg'] = "L'employé que vous essayé de supprimé n'existe pas";
      }else{
        $employee->delete();
        $response['status'] = 200;
        $response['msg'] = "L'employée ". $employee->name() ." a été bien supprimé";
      }
      echo json_encode($response);
    }
  }


}
