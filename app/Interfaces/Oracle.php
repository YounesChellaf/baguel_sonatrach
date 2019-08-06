<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 8/1/19
 * Time: 2:22 PM
 */

namespace App\Interfaces;


use App\Models\OraclePlanning;

class Oracle
{

    public static function getPlanning($matricule=null){
        $result = collect([]);
        if ($matricule==null){
            return OraclePlanning::all()->groupBy('PLA_MATRICULE')->count();
        }
        else
        {
            foreach ($matricule as $m)
            {
                $result = $result->concat(OraclePlanning::where('PLA_MATRICULE',$m)->get());
            }
            return $result;
        }
    }
}