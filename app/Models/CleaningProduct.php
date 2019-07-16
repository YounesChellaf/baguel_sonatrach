<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CleaningProduct extends Model
{
    protected $guarded=[];

    public function dotation(){
        return $this->belongsTo(DotationSupport::class,'dotation_support_id');
    }
}
