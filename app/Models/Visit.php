<?php

namespace App\Models;


use App\Models\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Visit extends Model
{
    protected $guarded = [];
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
        }
        return $visit;
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
}
