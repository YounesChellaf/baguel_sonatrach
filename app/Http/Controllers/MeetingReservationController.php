<?php

namespace App\Http\Controllers;

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
}
