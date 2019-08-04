<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class VisitorSupport extends Model
{
    protected $guarded=[];

    function visitor(){
        return $this->hasMany(Visitor::class,'support_id');
    }

    function employee(){
        return $this->belongsTo(Employee::class);
    }

    function demandeur($id){
        return User::find($id);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($support) { // before delete() method call this
            $support->visitor()->delete();
            // do the rest of the cleanup...
        });
    }
    public static function new(Request $request){

        if ($request->support_duration_type == 'restauration'){
            $date = $request->date_arriving;
        }
        else{
            $date= $request->date_from;
        }
        $visitor_support = VisitorSupport::create([
            'service_id' => $request->service_id,
            'motif' => $request->motif,
            'nb_repas' => $request->nb_repas,
            'date_from' => $date,
            'date_to' => $request->date_to,
            'imputation' => $request->imputation,
            'remark' => $request->remark,
            'concerned_id' => Auth::user()->id,
            'support_duration_type' => $request->support_duration_type,
            'service_type'=> $request->service_type,
        ]);
        $nb_prestation = $request->nb;
        for ($i=0;$i<$nb_prestation;$i++){
            $visitor= Visitor::create([
                'last_name' => $request->input('last_name')[$i],
                'first_name' => $request->input('first_name')[$i],
                'identity_card_number' => $request->input('identity_card_number')[$i],
                'function' => $request->input('function')[$i],
                'support_id' => $visitor_support->id,
            ]);
            if ($visitor_support->support_duration_type=='hebergement'){
                $room = Room::FreeRoom($visitor_support->date_from);
                if ($room->isReserved(new Carbon($visitor_support->date_from),new Carbon($visitor_support->date_to))){
                    $reservation = Reservation::create([
                        'reserver_id' => $visitor->id,
                        'cible' => 'visitor',
                        'room_id' => $room->id,
                        'date_in' => $visitor_support->date_from,
                        'date_out' => $visitor_support->date_to,
                        'remark' => 'reservation automatique depuis la prise en charge des visiteurs',
                        'room_type' => $visitor_support->service_type
                    ]);
                }
            }
        }
        return $visitor_support;
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

    public function affected_employee(){
        if ($this->employee_id == null){
            echo '<label class="label label-danger">En attente</label>';
        }
        else{
            return Employee::find($this->employee_id)->last_name .' '. Employee::find($this->employee_id)->first_name;
        }
    }
}
