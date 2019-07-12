<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Meeting_room extends Model
{
    protected $guarded=[];

    function reservation(){
        return $this->hasMany(MeetingReservation::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($meeting_room) { // before delete() method call this
            $meeting_room->reservation()->delete();
        });
    }

    public static function new(Request $request){
        $meeting_room = Meeting_room::create([
            'designation' => $request->designation,
            'total_capacity' => $request->total_capacity,
            'location' => $request->location,
        ]);
        return $meeting_room;
    }

    public function reserved(){
        switch ($this->reserved) {
            case false:
                echo '<label class="label label-success">Libre</label>';
                break;

            case true:
                echo '<label class="label label-danger">Occupé</label>';
                break;
            default:
                // code...
                break;
        }
    }
}
