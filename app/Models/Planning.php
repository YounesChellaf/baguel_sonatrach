<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $guarded=[];

    protected $casts=[
       'employee_id' => 'array'
    ];

    function room(){
        return $this->belongsTo(Room::class);
    }
    public function employee($id){
        return Employee::find($id);
    }
    public static function new(Request $request){
        $planning = Planning::create([
            'room_id' => $request->room_id,
            'employee_id1' =>$request->employee_id1,
            'employee_id2' => $request->employee_id2,
            'remark' => $request->remark
        ]);
        $room = Room::find($request->room_id);
        $room->reserved = true;
        $room->save();
        return $planning;
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
