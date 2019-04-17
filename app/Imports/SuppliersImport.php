<?php

namespace App\Imports;

use Auth;
use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SuppliersImport implements ToModel, WithHeadingRow{

  public function model(array $row){
    return new Supplier([
      'name' => $row['name'],
      'display_name' => $row['display_name'],
      'email' => $row['email'],
      'phone' => $row['phone'],
      'mobile' => $row['mobile'],
      'street' => $row['street'],
      'comments' => $row['comments'],
      'created_by' => Auth::user()->id,
    ]);
  }
}
