<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable =['number','floor','bloc_id','active'];

    function bloc(){
        return $this->belongsTo('App\Models\Bloc');
    }
}
