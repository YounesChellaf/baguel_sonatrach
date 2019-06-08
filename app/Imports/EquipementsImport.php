<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Equipement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class EquipementsImport implements ToModel, WithHeadingRow
{

    public function model(array $row){

        //check employee unicity with employee_number
        if(Equipement::IsUnique($row['type'],$row['marque'])){
            return new Equipement([
                'type' => $row['type'],
                'marque' => $row['marque'],
            ]);
        }
    }
}
