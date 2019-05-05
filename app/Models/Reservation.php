<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded =[];

    function room(){
         return $this->belongsTo(Room::class);
    }
    function employee(){
        return $this->belongsTo(Employee::class);
    }

    public static function new(Request $request){

         $reservation = Reservation::create([
            'employee_id' => $request->employee_id,
            'room_id' => $request->room_id,
            'date_in' => $request->date_in,
            'date_out' => $request->date_out,
            'remark' => $request->remark
        ]);
         return $reservation;
    }
    public function status(){
        switch ($this->status) {
            case 'draft':
                echo '<label class="label label-default">Brouillon</label>';
                break;

            case 'approved':
                echo '<label class="label label-success">Approuvé</label>';
                break;

            case 'rejected':
                echo '<label class="label label-danger">Rejeté</label>';
                break;

            default:
                // code...
                break;
        }
    }
}
