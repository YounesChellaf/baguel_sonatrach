<?php

namespace App\Imports;

use App\Models\Bloc;
use App\Models\OraclePlanning;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class OracleImporte implements ToModel, WithHeadingRow
{

    public function model(array $row){


        //dd($row['name'],$row['number'],$row['type']);
        //check employee unicity with employee_number
        return new OraclePlanning([
            'PLA_CPOINTAG' =>$row['c1'],
            'PLA_MATRICULE' =>$row['c2'],
            'PLA_DDEBUT' =>$row['c3'],
            'PLA_DFIN' =>$row['c4'],
            'PLA_VALIDE' =>$row['c5'],
            'PLA_CEMPLOYEUR' =>$row['c6'],
        ]);

    }


}
