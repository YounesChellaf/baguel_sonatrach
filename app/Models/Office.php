<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $guarded = [];

    public static function IsUnique($number)
    {
        return Office::where('number',$number)->count() == 0;
    }

    function bloc(){
        return $this->belongsTo('App\Models\Bloc');
    }
    function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function reserved(){
        switch ($this->reserved) {
            case false:
                echo '<label class="label label-success">Libre</label>';
                break;

            case true:
                echo '<label class="label label-danger">Occupé</label></br></br>';
                echo '<strong>Par : </strong><label class="label label-inverse-primary">'.$this->employee->last_name.' ' .$this->employee->first_name . '</label>';
                break;
            default:
                // code...
                break;
        }
    }
}
