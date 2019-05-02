<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    public function index(){
        return view('reservation.index');
    }
    public function create(){
        return view('reservation.create');
    }
    public function store(Request $request){
        if ($request->post()){
            $reservation = Reservation::new($request);
        }
        return redirect()->route('admin.reservation.index');
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
