<?php

namespace App\Models;

use Auth;
use Carbon\Carbon;
use App\Models\SystemConfig;
use Illuminate\Database\Eloquent\Model;
class ExitPermission extends Model
{
  protected $guarded = [];
  protected $casts = [
    'created_at' => 'Y-m-d',
  ];

  public function getDates(){
    return ['created_at', 'updated_at', 'request_validated_at', 'exit_date', 'expire_at'];
  }

  public function getCreatedAtAttribute(){
    return  Carbon::parse($this->attributes['created_at'])->isoFormat('dddd D MMM YYYY');
  }

  public function getUpdatedAtAttribute(){
    return  Carbon::parse($this->attributes['updated_at'])->isoFormat('dddd D MMM YYYY');
  }

  public function getApprovedAtAttribute(){
    return  $this->attributes['request_validated_at'] ? Carbon::parse($this->attributes['request_validated_at'])->isoFormat('dddd D MMM YYYY') : '/';
  }

  public function getExitDateAttribute(){
    return  $this->attributes['exit_date'] ? Carbon::parse($this->attributes['exit_date'])->isoFormat('dddd D MMM YYYY') : '/';
  }

  public function getExpireDateAttribute(){
    return  $this->attributes['expire_at'] ? Carbon::parse($this->attributes['expire_at'])->isoFormat('dddd D MMM YYYY') : '/';
  }

  public function _computeExpiryDate(){
    $exitDate = new \DateTime($this->exit_date);
    $exitTime = new \DateTime($this->exit_time);
    $expireAt = new \DateTime($exitDate->format('Y-m-d') .' ' .$exitTime->format('H:i:s'));
    $this->expire_at = $expireAt;
    $this->save();
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

  public static function ref(){
    $docRefPrefix = SystemConfig::config('ep_prefix');
    $epFormat = SystemConfig::config('ep_ref_format');
    $sn = ExitPermission::all()->count() + 1;
    $ref = str_replace("{PREFIX}", $docRefPrefix, $epFormat);
    $ref = str_replace("{YEAR}", date('Y'), $ref);
    $ref = str_replace("{SN}", sprintf("%0".SystemConfig::config('ep_sn_positions')."d", $sn), $ref);
    return $ref;
  }

  public static function new($request){
    if($request->post()){
      $exitPermission = ExitPermission::create([
        'ref' => ExitPermission::ref(),
        'exit_date' => $request->exitDate,
        'exit_time' => $request->exitTime,
        'entrance_time' => $request->entranceTime,
        'comments' => $request->comments,
        'exit_reason' => $request->exitReason,
        'created_by' => Auth::user()->id,
      ]);
      $exitPermission->_computeExpiryDate();
      return $exitPermission;
    }
  }

  public function approve(){
    $this->approved_at = Carbon::now();
    $this->status = 'approved';
    $this->approved_by = Auth::user()->id;
    $this->save();
  }

  public function reject(){
    $this->status = 'rejected';
    $this->save();
  }

  public function CreatedBy(){
    return $this->belongsTo('App\Models\User', 'created_by', 'id');
  }

  public function ApprovedBy(){
    return $this->belongsTo('App\Models\User', 'approved_by', 'id');
  }

  public function LastUpdateBy(){
    return $this->belongsTo('App\Models\User', 'last_update_by', 'id');
  }
}
