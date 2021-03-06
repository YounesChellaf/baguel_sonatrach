<?php

namespace App\Models;


use App\Models\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Visit extends Model
{
    protected $guarded = [];
    protected $dates=['in_date','out_date'];
    function visitor(){
        return $this->belongsToMany('App\Models\Visitor','visit_visitor');
    }
    function employee(){
        return $this->belongsToMany('App\Models\Employee','employee_visit');
    }
    function CreatedBy(){
        return $this->belongsTo('App\Models\User','created_by','id');
    }

    function ConcernedEmployee(){
        return $this->belongsTo('App\Models\User','concerned_id','id');
    }
    public static function new($request){
        $visit = Visit::create([
            'company_name' => $request->company_name,
            'in_date' => $request->in_date,
            'out_date' => $request->out_date,
            'type' => $request->type,
            'concerned_id' => $request->concerned_id,
            'reason' => $request->reason,
            'remark' => $request->remark,
            'created_by' => Auth::user()->id,
        ]);
        $visit->employee()->attach($request->concerned_id);
        $nb_visitor = $request->nb;
        for ($i=0;$i<$nb_visitor;$i++){
            $visitor = Visitor::create([
                'last_name' => $request->input('last_name')[$i],
                'first_name' => $request->input('first_name')[$i],
                'identity_card_number' => $request->input('identity_card_number')[$i],
                'function' => $request->input('function')[$i],
            ]);
            $visit->visitor()->attach($visitor->id);
            $room = Room::FreeRoom($visit->date_in);
            if ($visit->in_date->lessThan($visit->out_date)) {
                if ($room->isReserved(new Carbon($visit->in_date), new Carbon($visit->out_date))) {
                    $reservation = Reservation::create([
                        'reserver_id' => $visitor->id,
                        'cible' => 'visitor',
                        'room_id' => $room->id,
                        'date_in' => $visit->in_date,
                        'date_out' => $visit->out_date,
                        'remark' => 'reservation automatique depuis la prise en charge des visiteurs',
                        'room_type' => 'ordinaire'
                    ]);
                }
            }
        }
        return $visit;
    }

    public static function percent($status){
        if (Visit::all()->count() != 0){
            return Visit::where('status',$status)->count()/Visit::all()->count()*100;
        }
        else return 0;
    }
    public function status(){
        switch ($this->status) {
            case 'pending':
                echo '<label class="label label-default">En attente</label>';
                break;

            case 'enter_validation':
                echo '<label class="label label-success">Entrée Approuvé</label>';
                break;

            case 'exit_validation':
                echo '<label class="label label-success">Sortie Approuvé</label>';
                break;

            case 'rejected':
                echo '<label class="label label-danger">Rejeté</label>';
                break;

            default:
                // code...
                break;
        }
    }
    public function type(){
        switch ($this->type) {
            case 'planned_visit':
                echo '<label class="label label-info">Visite Programmé</label>';
                break;

            case 'unplanned_visit':
                echo '<label class="label label-warning">Visite Inopiné</label>';
                break;

            default:
                // code...
                break;
        }
    }
}
