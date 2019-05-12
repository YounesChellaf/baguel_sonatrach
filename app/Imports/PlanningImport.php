<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Planning;
use App\Models\Room;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PlanningImport implements ToModel, WithHeadingRow
{

    public function model(array $row){
        $room =  Room::find($row['room_id']);
        if (Employee::where('employee_number',$row['matricule_1'])->first() && Employee::where('employee_number',$row['matricule_2'])->first() && $room) {
            if (!$room->reserved) {
                $employee1_id = Employee::where('employee_number', $row['matricule_1'])->first()->id;
                $employee2_id = Employee::where('employee_number', $row['matricule_2'])->first()->id;
                $room->reserved = true;   
                return new Planning([
                    'employee_id1' => $employee1_id,
                    'employee_id2' => $employee2_id,
                    'room_id' => $row['room_id'],
                    'remark' => $row['remark'],
                ]);
            }
        }
    }
}
