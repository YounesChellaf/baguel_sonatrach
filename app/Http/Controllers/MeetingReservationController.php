<?php

namespace App\Http\Controllers;

use App\Models\Meeting_room;
use App\Models\MeetingReservation;
use Illuminate\Http\Request;

class MeetingReservationController extends Controller
{
    public function index(){
        return view('meeting_room_reservation.index');
    }

    public function create(){
        return view('meeting_room_reservation.create');
    }

    public function store(Request $request){
        if ($request->post()){
            $reservation = MeetingReservation::new($request);
            return redirect()->route('admin.meeting_reservation.index');
        }
    }

    public function update($id,Request $request){
        $reservation = MeetingReservation::find($id);
        $reservation->meeting_room_id = $request->meeting_room_id;
        $reservation->date_reservation = $request->date_reservation;
        $reservation->time_in = $request->time_in;
        $reservation->time_out = $request->time_out;
        $reservation->remark = $request->remark;
        $reservation->save();
        return redirect()->route('admin.meeting_reservation.index');
    }
    public function aprouve($id){
        $reservation = MeetingReservation::find($id);
        $reservation->status = 'approved';
        $reservation->save();
        return redirect()->back();

    }
    public  function  reject($id){
        $reservation =MeetingReservation::find($id);
        $reservation->status = 'rejected';
        $reservation->save();
        return redirect()->back();
    }
    public function destroy($id){
        $meeting_reservation = MeetingReservation::find($id);
        $meeting_reservation->meeting_room->reserved = false;
        $meeting_reservation->meeting_room->save();
        MeetingReservation::destroy($id);
        return redirect()->route('admin.meeting_reservation.index');
    }
}
