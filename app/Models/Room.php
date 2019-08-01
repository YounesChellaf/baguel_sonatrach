<?php

namespace App\Models;

use App\Models\EquipementInstance;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Room extends Model
{
    //
    protected $guarded = [];

    function bloc(){
        return $this->belongsTo(Bloc::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
    function instance(){
        return $this->hasMany(EquipementInstance::class);
    }
    function reservation(){
        return $this->hasMany(Reservation::class);
    }
    function planning(){
        return $this->hasMany(Planning::class);
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($room) { // before delete() method call this
            $room->reservation()->delete();
            $room->planning()->delete();
            // do the rest of the cleanup...
        });
    }

    public function state(){
        $current_date = Carbon::now();
        foreach (Reservation::where('room_id',$this->id)->get() as $reservation){
            if ($current_date->between($reservation->date_in,$reservation->date_out)){
                return true;
                break;
            }
        }
        return false;
    }

    public function reserved(){
        switch ($this->state()) {
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

    public function isReserved($date_from,$date_to){
        $date_in = new Carbon($date_from);
        $date_out = new Carbon($date_to);
        $reserved_room = Reservation::where('room_id',$this->id)->get();
        foreach ($reserved_room as $reservation){
            if ($date_in->between($reservation->date_in, $reservation->date_out) or  $date_out->between($reservation->date_in, $reservation->date_out)){
                return false;
                break;
            }
        }
        return true;
    }


    public static function occupation_rate($date_from,$date_to){
        $current_date = Carbon::now();
        if ($date_from and $date_to){
         return   Reservation::where('date_in','>=',$date_from)->orWhere('date_out','=<',$date_to)->groupBy('room_id')->get()->count();
        }
        if ($date_from){
            return Reservation::where('date_in','<',$date_from)->where('date_out','>',$date_from)->groupBy('room_id')->count();
        }
        return Reservation::where('date_in','<',$current_date)->where('date_out','>',$current_date)->groupBy('room_id')->count();
    }

}
