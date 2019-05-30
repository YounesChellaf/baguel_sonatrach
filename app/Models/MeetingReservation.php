<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingReservation extends Model
{
    protected $guarded =[];

    function meeting_room(){
        return $this->belongsTo(Meeting_room::class);
    }
    function reserver(){
        return $this->belongsTo(User::class);
    }

    public static function new(Request $request){

        $reservation = MeetingReservation::create([
            'reserver_id' => $request->reserver_id,
            'meeting_room_id' => $request->meeting_room_id,
            'date_reservation' => $request->date_reservation,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
            'remark' => $request->remark
        ]);
        $meeting_room = Meeting_room::find($request->meeting_room_id);
        $meeting_room->reserved = true;
        $meeting_room->save();
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
