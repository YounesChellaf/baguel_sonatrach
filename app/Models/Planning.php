<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $casts = [
        'employee_id' => 'array'
    ];
    protected $guarded=[];
    function room(){
        return $this->belongsTo(Room::class);
    }
    function employee(){
        return $this->belongsTo(Employee::class);
    }

}
