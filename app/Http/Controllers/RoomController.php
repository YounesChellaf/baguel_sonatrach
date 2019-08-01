<?php

namespace App\Http\Controllers;

use App\Models\EquipementInstance;
use App\Models\Room;
use Illuminate\Http\Request;
use function PHPSTORM_META\override;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occuped_room = Room::occupation_rate(null,null);
        return view('room.index')->with('occuped_room',$occuped_room);
    }

    public function graphicView(){
        return view('room.graphic_view');
    }


    public function RoomOccupation(Request $request){
        $occuped_room = Room::occupation_rate($request->date_from,$request->date_to);
        return view('room.index')->with('occuped_room',$occuped_room);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->post()){
            $room =Room::create([
                'number' =>$request->nombre,
                'bloc_id' =>$request->bloc_id,
            ]);
            $nb = $request->nb;
            for ($i=0;$i<$nb;$i++){
                EquipementInstance::create([
                   'reference' => $request->input('reference')[$i],
                   'number' => $request->input('number')[$i],
                   'equipement_id' => $request->input('equipement_id')[$i],
                   'status' => $request->input('status')[$i],
                    'room_id' => $room->id,
                ]);
            }
        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $number = $request->input('nombre');
        $bloc_id = $request->input('bloc_id');
        $room = Room::find($id);
        $nb = $room->instance->count();
        if ($request->nb != null) { $nb=$request->nb;}
            $room->number =$number;
            $room->bloc_id =$bloc_id;
        $room->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::destroy($id);
        return redirect()->back();
    }

    public function import(Request $request){
        if($request->post()){
            if($request->file('RoomsFileInput')){
                Excel::import(new RoomsImport, $request->file('RoomsFileInput'));
                return back();
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
}
