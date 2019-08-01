<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\NewReservationRequest;

class Reservation extends Model
{
    protected $guarded =[];

    protected $dates=['date_in','date_out'];

    function room(){
         return $this->belongsTo(Room::class);
    }
    function employee(){
        return $this->belongsTo(Employee::class);
    }

    public static function new(Request $request){
        if (Room::find($request->room_id)->isReserved(new Carbon($request->date_in),new Carbon($request->date_out))){

            $reservation = Reservation::create([
                'employee_id' => $request->employee_id,
                'room_id' => $request->room_id,
                'date_in' => $request->date_in,
                'date_out' => $request->date_out,
                'remark' => $request->remark
            ]);
            $room = Room::find($request->room_id);
            $room->reserved = true;
            $room->save();
            return 'no-error';
        }
        return  'Reservation non permise á cause du chevauchement des dates avec une autre reservation précédente';

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
