<?php

namespace App\Models;

use App\Models\Support;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    protected $guarded=[];

    function support(){
        return $this->belongsToMany(Support::class,'prestation_support');
    }
    function product(){
        return $this->belongsTo(Product::class);
    }
}
