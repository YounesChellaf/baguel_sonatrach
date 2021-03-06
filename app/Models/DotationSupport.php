<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DotationSupport extends Model
{
    protected $guarded=[];

    public function cleaning_product(){
        return $this->hasMany(CleaningProduct::class);
    }
    function demandeur($id){
        return User::find($id);
    }

    function employee(){
        return $this->belongsTo(Employee::class);
    }
    public static function new(Request $request){
        $dotation_support = DotationSupport::create([
            'purchase_order' => $request->purchase_order,
            'date_from' => $request->support_date_from,
            'date_to' => $request->support_date_to,
            'imputation' => $request->imputation,
            'concerned_id' => Auth::user()->id,
        ]);
        $nb_prestation = $request->nb;
        for ($i=0;$i<$nb_prestation+1;$i++){
            $cleaning_product= CleaningProduct::create([
                'product_name' => $request->input('product_name')[$i],
                'observation' => $request->input('observation')[$i],
                'quantity' => $request->input('quantity')[$i],
                'dotation_support_id' => $dotation_support->id,
            ]);
        }
        return $dotation_support;
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
