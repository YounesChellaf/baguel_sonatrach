<?php

namespace App\Imports;

use App\Models\Bloc;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class BlocsImport implements ToModel, WithHeadingRow
{

    public function model(array $row){

        //check employee unicity with employee_number
            Bloc::create([
                'name' =>$row['name'],
                'number' =>$row['number'],
                'type' =>$row['type'],
            ]);

    }


}
