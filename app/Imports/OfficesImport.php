<?php

namespace App\Imports;

use App\Models\Bloc;
use App\Models\Employee;
use App\Models\Office;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class OfficesImport implements ToModel, WithHeadingRow
{

    public function model(array $row){

        //check employee unicity with employee_number
        if(Office::IsUnique($row['number'])){
            if ($bloc_id = Bloc::where('name',$row['bloc_name'])->first()->id){
                return new Office([
                    'number' => $row['number'],
                    'bloc_id' => $bloc_id
                ]);
            }
        }
    }
}
