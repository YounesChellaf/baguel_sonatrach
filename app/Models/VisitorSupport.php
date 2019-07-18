<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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
    public static function new(Request $request){
        $visitor_support = VisitorSupport::create([
            'service_id' => $request->service_id,
            'motif' => $request->motif,
            'nb_repas' => $request->nb_repas,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'imputation' => $request->imputation,
            'remark' => $request->remark,
            'concerned_id' => Auth::user()->id,
        ]);
        $nb_prestation = $request->nb;
        for ($i=0;$i<$nb_prestation;$i++){
            $visitor= Visitor::create([
                'last_name' => $request->input('last_name')[$i],
                'first_name' => $request->input('first_name')[$i],
                'identity_card_number' => $request->input('identity_card_number')[$i],
                'support_id' => $visitor_support->id,
            ]);
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
