<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CleaningOrder extends Model
{
    protected $dates=['limit_date','done_date'];
    protected $guarded=[];

    function employee(){
        return $this->belongsToMany(Employee::class,'employee_cleaning_order');
    }

    public static function new(Request $request){
        if ($request->site_type == 1){
            $site_type = 'room';
            $site_id = $request->room_id;
        }
        else {
            $site_type = 'office';
            $site_id = $request->office_id;
        }
        $cleaning_order = CleaningOrder::create([
            'site_type' => $site_type,
            'site_id' => $site_id,
            'supervisor_id' => $request->supervisor_id,
            'limit_date' => $request->limit_date,
            'remark' => $request->remark,
            'degree' => $request->degree,
        ]);
        return $cleaning_order;
    }

    public function isLate(){

        if ($this->done_date and $this->done_date->greaterThan($this->limit_date)){
            echo '<label class="label label-danger">En retard</label>';
        }
    }

     public function degree(){
        switch ($this->degree) {
            case '0':
                echo '<label class="label label-primary">Non urgent</label>';
                break;

            case '1':
                echo '<label class="label label-danger">Urgent</label>';
                break;
            default:
                // code...
                break;
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

            case 'in progress':
                echo '<label class="label label-primary">En progression</label>';
                break;

            case 'done':
                echo '<label class="label label-info">Fait</label>';
                break;

            default:
                // code...
                break;
        }
    }
}
