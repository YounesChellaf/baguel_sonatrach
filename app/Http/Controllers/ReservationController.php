<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewReservationRequest;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    public function index(){
        return view('reservation.index');
    }
    public function create(){
        return view('reservation.create')->with('room',null)->with('reserved_error',null);
    }

    public function checkView($id){
        $room = Reservation::find($id)->room;
//        dd($room->instance[0]);
        return view('reservation.room_checklist')->with('instances',$room->instance);
    }
    public function createRoomReservation($id){
        $room = Room::find($id);
        return view('reservation.create')->with('room',$room)->with('reserved_error',null);
    }
    public function store(NewReservationRequest $request){
        if ($request->post()){
            $reservation = Reservation::new($request);
            if ($reservation == 'no-error'){
                return redirect()->route('admin.reservation.index');
            }
            else{
                return view('reservation.create')->with('room',null)->with('reserved_error',$reservation);
            }
        }

    }
    public function aprouve($id){
        $reservation = Reservation::find($id);
        $reservation->status = 'approved';
        $reservation->save();
        return redirect()->back();

    }
    public  function  reject($id){
        $reservation =Reservation::find($id);
        $reservation->status = 'rejected';
        $reservation->save();
        return redirect()->back();
    }
    public function destroy($id){
        Reservation::destroy($id);
        return redirect()->route('admin.reservation.index');
    }
}
