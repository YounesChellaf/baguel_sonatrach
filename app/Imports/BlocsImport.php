<?php

namespace App\Imports;

use App\Models\Bloc;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class BlocsImport implements ToModel, WithHeadingRow
{

    public function model(array $row){


        //dd($row['name'],$row['number'],$row['type']);
        //check employee unicity with employee_number
            return new Bloc([
                'name' =>$row['name'],
                'number' =>$row['number'],
                'type' =>$row['type'],
            ]);

    }


}
