<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class EmployeesImport implements ToModel, WithHeadingRow
{

  public function model(array $row){

    //check employee unicity with employee_number
    if(Employee::IsUnique($row['employee_number'])){
      return new Employee([
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name'],
        'sexe' => $row['sexe'],
        'phone' => $row['phone'],
        'mobile' => $row['mobile'],
        'business_address' => $row['business_adr'],
        'type' => $row['type'],
        'n_cin' => $row['n_cin'],
        'n_passport' => $row['n_passport'],
        'employee_number' => $row['employee_number'],
      ]);
    }
  }
}
