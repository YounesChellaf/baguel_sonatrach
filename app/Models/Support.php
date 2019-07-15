<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Support extends Model
{
    protected $guarded=[];
    function prestation(){
        return $this->belongsToMany(Prestation::class,'prestation_support');
    }
    function demandeur($id){
        return User::find($id);
    }

    public static function new(Request $request){
      if ($request->post()){
          $support = Support::create([
              'motif' => $request->motif_support,
              'date_from' => $request->support_date_from,
              'date_to' => $request->support_date_to,
              'remark' => $request->remark,
              'imputation' => $request->imputation,
              'concerned_id' => Auth::user()->id,
          ]);
          $nb_prestation = $request->nb;
          for ($i=0;$i<$nb_prestation;$i++){
              $prestation = Prestation::create([
                 'product_name' => $request->input('prestation')[$i],
                 'quantity' => $request->input('quantity')[$i],
              ]);
              $support->prestation()->attach($prestation->id);
          }
      }
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
