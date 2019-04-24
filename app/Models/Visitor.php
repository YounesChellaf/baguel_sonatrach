<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

class Visitor extends Model
{
    protected $guarded = [];

    function visit(){
        return $this->belongsToMany('App\Models\Visit','visit_visitor');
    }

    public static function new(Request $request){
        if ($request->post()){
            $visitor = Visitor::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'identity_card_number' => $request->identity_card_number,
                'function' => $request->function,
            ]);
            return $visitor;
        }
    }

    public static function upto(Request $request,int $id)
    {
        if ($request->post()){
            $visitor = Visitor::find($id);
            $visitor->last_name = $request->last_name;
            $visitor->first_name = $request->first_name;
            $visitor->identity_card_number = $request->identity_card_number;
            $visitor->function = $request->function;
            $visitor->save();
        }
        return $visitor;
    }
}
