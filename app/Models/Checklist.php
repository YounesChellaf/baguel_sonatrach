<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $guarded=[];
    protected $casts=[
        'census' => 'array'
    ];
}
