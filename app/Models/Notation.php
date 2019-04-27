<?php

namespace App\Models;

use Auth;
use Carbon\Carbon;
use App\Models\NotationCriteria;
use Illuminate\Database\Eloquent\Model;
class Notation extends Model
{
  protected $guarded = [];

  public static function _prepareStorageScores($request){
    $scores = array();
    $scoreTotal = 0;
    $sumScores = 0;
    $scoreDetails = array();
    $criterias = NotationCriteria::storageNotationCriterias();
    foreach ($criterias as $key => $criteria){
      $tmpArray = array();
      if(isset($request->post()['rating-'.$criteria->id])){
        $tmpArray[$criteria->id] = [
          'score' => $request->post()['rating-'.$criteria->id],
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }else{
        $tmpArray[$criteria->id] = [
          'score' => 0,
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }
      $sumScores += $tmpArray[$criteria->id];
      array_push($scoreDetails, $tmpArray);
    }
    //computeTotalScore
    $countCriterias = $criterias->count();
    $scoreTotal = $sumScores / $countCriterias;
    $scores['details'] = $scoreDetails;
    $scores['total'] = $scoreTotal;
    return $scores;
  }

  public static function _prepareKitchenScores($request){
    $scores = array();
    $scoreTotal = 0;
    $sumScores = 0;
    $scoreDetails = array();
    $criterias = NotationCriteria::kitchenNotationCriterias();
    foreach ($criterias as $key => $criteria){
      $tmpArray = array();
      if(isset($request->post()['rating-'.$criteria->id])){
        $tmpArray[$criteria->id] = [
          'score' => $request->post()['rating-'.$criteria->id],
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }else{
        $tmpArray[$criteria->id] = [
          'score' => 0,
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }
      $sumScores += $tmpArray[$criteria->id]['score'];
      array_push($scoreDetails, $tmpArray);
    }
    //computeTotalScore
    $countCriterias = $criterias->count();
    $scoreTotal = $sumScores / $countCriterias;
    $scores['details'] = $scoreDetails;
    $scores['total'] = $scoreTotal;
    return $scores;
  }

  public static function _prepareReceptionScores($request){
    $scores = array();
    $scoreTotal = 0;
    $sumScores = 0;
    $scoreDetails = array();
    $criterias = NotationCriteria::deliveryNoationCriterias();
    foreach ($criterias as $key => $criteria){
      $tmpArray = array();
      if(isset($request->post()['rating-'.$criteria->id])){
        $tmpArray[$criteria->id] = [
          'score' => $request->post()['rating-'.$criteria->id],
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }else{
        $tmpArray[$criteria->id] = [
          'score' => 0,
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }
      $sumScores += $tmpArray[$criteria->id]['score'];
      array_push($scoreDetails, $tmpArray);
    }
    //computeTotalScore
    $countCriterias = $criterias->count();
    $scoreTotal = $sumScores / $countCriterias;
    $scores['details'] = $scoreDetails;
    $scores['total'] = $scoreTotal;
    return $scores;
  }

  public static function _prepateRestaurantScores($request){
    $scores = array();
    $scoreTotal = 0;
    $sumScores = 0;
    $scoreDetails = array();
    $criterias = NotationCriteria::restaurantNotationCriterias();
    foreach ($criterias as $key => $criteria){
      $tmpArray = array();
      if(isset($request->post()['rating-'.$criteria->id])){
        $tmpArray[$criteria->id] = [
          'score' => $request->post()['rating-'.$criteria->id],
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }else{
        $tmpArray[$criteria->id] = [
          'score' => 0,
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }
      $sumScores += $tmpArray[$criteria->id]['score'];
      array_push($scoreDetails, $tmpArray);
    }
    //computeTotalScore
    $countCriterias = $criterias->count();
    $scoreTotal = $sumScores / $countCriterias;
    $scores['details'] = $scoreDetails;
    $scores['total'] = $scoreTotal;
    return $scores;
  }

  public static function _prepareRoomScores($request){
    $scores = array();
    $scoreTotal = 0;
    $sumScores = 0;
    $scoreDetails = array();
    $criterias = NotationCriteria::roomsNotationCriterias();
    foreach ($criterias as $key => $criteria){
      $tmpArray = array();
      if(isset($request->post()['rating-'.$criteria->id])){
        $tmpArray[$criteria->id] = [
          'score' => $request->post()['rating-'.$criteria->id],
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }else{
        $tmpArray[$criteria->id] = [
          'score' => 0,
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }
      $sumScores += $tmpArray[$criteria->id]['score'];
      array_push($scoreDetails, $tmpArray);
    }
    //computeTotalScore
    $countCriterias = $criterias->count();
    $scoreTotal = $sumScores / $countCriterias;
    $scores['details'] = $scoreDetails;
    $scores['total'] = $scoreTotal;
    return $scores;
  }

  public static function _prepareLaundryScores($request){
    $scores = array();
    $scoreTotal = 0;
    $sumScores = 0;
    $scoreDetails = array();
    $criterias = NotationCriteria::laundryNotationCriterias();
    foreach ($criterias as $key => $criteria){
      $tmpArray = array();
      if(isset($request->post()['rating-'.$criteria->id])){
        $tmpArray[$criteria->id] = [
          'score' => $request->post()['rating-'.$criteria->id],
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }else{
        $tmpArray[$criteria->id] = [
          'score' => 0,
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }
      $sumScores += $tmpArray[$criteria->id]['score'];
      array_push($scoreDetails, $tmpArray);
    }
    //computeTotalScore
    $countCriterias = $criterias->count();
    $scoreTotal = $sumScores / $countCriterias;
    $scores['details'] = $scoreDetails;
    $scores['total'] = $scoreTotal;
    return $scores;
  }

  public static function _prepareOfficeScores($request){
    $scores = array();
    $scoreTotal = 0;
    $sumScores = 0;
    $scoreDetails = array();
    $criterias = NotationCriteria::officeNotationCriterias();
    foreach ($criterias as $key => $criteria){
      $tmpArray = array();
      if(isset($request->post()['rating-'.$criteria->id])){
        $tmpArray[$criteria->id] = [
          'score' => $request->post()['rating-'.$criteria->id],
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }else{
        $tmpArray[$criteria->id] = [
          'score' => 0,
          'comment' => $request->post()['rating-comment-option-'.$criteria->id]
        ];
      }
      $sumScores += $tmpArray[$criteria->id]['score'];
      array_push($scoreDetails, $tmpArray);
    }
    //computeTotalScore
    $countCriterias = $criterias->count();
    $scoreTotal = $sumScores / $countCriterias;
    $scores['details'] = $scoreDetails;
    $scores['total'] = $scoreTotal;
    return $scores;
  }

  public static function prepareScores($request){
    $scores = array();
    switch ($request->controlType) {
      case 'storage':
      $scores = Notation::_prepareStorageScores($request);
      break;

      case 'kitchen':
      $scores = Notation::_prepareKitchenScores($request);
      break;

      case 'reception':
      $scores = Notation::_prepareReceptionScores($request);
      break;

      case 'restaurant':
      $scores = Notation::_prepateRestaurantScores($request);
      break;

      case 'rooms':
      $scores = Notation::_prepareRoomScores($request);
      break;

      case 'laundry':
      $scores = Notation::_prepareLaundryScores($request);
      break;

      case 'office':
      $scores = Notation::_prepareOfficeScores($request);
      break;

      default:
      return ;
      break;
    }
    return $scores;
  }

  public static function _prepareStorageData($request){
    $data = array();
    $data['header'] = [
      'date' => $request->controlDate,
      'time' => $request->controlTime,
    ];
    return $data;
  }

  public static function _prepareKitchenData($request){
    $data = array();
    $data['header'] = [
      'date' => $request->controlDate,
      'time' => $request->controlTime,
    ];
    return $data;
  }

  public static function _prepareReceptionData($request){
    $data = array();
    $data['header'] = [
      'date' => $request->controlDate,
      'time' => $request->controlTime,
      'productNature' => $request->productNature,
      'originDocument' => $request->originDocument,
    ];
    return $data;
  }

  public static function _prepareRestaurantData($request){
    $data = array();
    $data['header'] = [
      'date' => $request->controlDate,
      'time' => $request->controlTime,
    ];
    return $data;
  }

  public static function _prepareRoomData($request){
    $data = array();
    $data['header'] = [
      'date' => $request->controlDate,
      'time' => $request->controlTime,
    ];
    return $data;
  }

  public static function _prepareLaundryData($request){
    $data = array();
    $data['header'] = [
      'date' => $request->controlDate,
      'time' => $request->controlTime,
    ];
    return $data;
  }

  public static function _prepareOfficeData($request){
    $data = array();
    $data['header'] = [
      'date' => $request->controlDate,
      'time' => $request->controlTime,
    ];
    return $data;
  }

  public static function prepareData($request){
    $data = array();
    switch ($request->controlType) {
      case 'storage':
      $data = Notation::_prepareStorageData($request);
      break;

      case 'kitchen':
      $data = Notation::_prepareKitchenData($request);
      break;

      case 'reception':
      $data = Notation::_prepareReceptionData($request);
      break;

      case 'restaurant':
      $data = Notation::_prepareRestaurantData($request);
      break;

      case 'rooms':
      $data = Notation::_prepareRestaurantData($request);
      break;

      case 'laundry':
      $data = Notation::_prepareLaundryData($request);
      break;

      case 'office':
      $data = Notation::_prepareOfficeData($request);
      break;

      default:
      return ;
      break;
    }
    return json_encode($data);
  }

  public static function _getNewStorageControlRef(){
    $docRefPrefix = SystemConfig::config('smn_prefix');
    $epFormat = SystemConfig::config('smn_ref_format');
    $sn = Notation::where('type', 'storage')->count() + 1;
    $ref = str_replace("{PREFIX}", $docRefPrefix, $epFormat);
    $ref = str_replace("{YEAR}", date('Y'), $ref);
    $ref = str_replace("{SN}", sprintf("%0".SystemConfig::config('smn_positions')."d", $sn), $ref);
    return $ref;
  }

  public static function _getNewKitchenControlRef(){
    $docRefPrefix = SystemConfig::config('ktn_prefix');
    $epFormat = SystemConfig::config('ktn_ref_format');
    $sn = Notation::where('type', 'kitchen')->count() + 1;
    $ref = str_replace("{PREFIX}", $docRefPrefix, $epFormat);
    $ref = str_replace("{YEAR}", date('Y'), $ref);
    $ref = str_replace("{SN}", sprintf("%0".SystemConfig::config('ktn_positions')."d", $sn), $ref);
    return $ref;
  }

  public static function _getNewReceptionControlRef(){
    $docRefPrefix = SystemConfig::config('shn_prefix');
    $epFormat = SystemConfig::config('shn_ref_format');
    $sn = Notation::where('type', 'reception')->count() + 1;
    $ref = str_replace("{PREFIX}", $docRefPrefix, $epFormat);
    $ref = str_replace("{YEAR}", date('Y'), $ref);
    $ref = str_replace("{SN}", sprintf("%0".SystemConfig::config('shn_positions')."d", $sn), $ref);
    return $ref;
  }

  public static function _getNewRestaurantControlRef(){
    $docRefPrefix = SystemConfig::config('rfn_prefix');
    $epFormat = SystemConfig::config('rfn_ref_format');
    $sn = Notation::where('type', 'restaurant')->count() + 1;
    $ref = str_replace("{PREFIX}", $docRefPrefix, $epFormat);
    $ref = str_replace("{YEAR}", date('Y'), $ref);
    $ref = str_replace("{SN}", sprintf("%0".SystemConfig::config('rfn_positions')."d", $sn), $ref);
    return $ref;
  }

  public static function _getNewRoomsControlRef(){
    $docRefPrefix = SystemConfig::config('rmn_prefix');
    $epFormat = SystemConfig::config('rmn_ref_format');
    $sn = Notation::where('type', 'rooms')->count() + 1;
    $ref = str_replace("{PREFIX}", $docRefPrefix, $epFormat);
    $ref = str_replace("{YEAR}", date('Y'), $ref);
    $ref = str_replace("{SN}", sprintf("%0".SystemConfig::config('rmn_positions')."d", $sn), $ref);
    return $ref;
  }

  public static function _getNewLaundryControlRef(){
    $docRefPrefix = SystemConfig::config('lun_prefix');
    $epFormat = SystemConfig::config('lun_ref_format');
    $sn = Notation::where('type', 'laundry')->count() + 1;
    $ref = str_replace("{PREFIX}", $docRefPrefix, $epFormat);
    $ref = str_replace("{YEAR}", date('Y'), $ref);
    $ref = str_replace("{SN}", sprintf("%0".SystemConfig::config('lun_positions')."d", $sn), $ref);
    return $ref;
  }

  public static function _getNewOfficeControlRef(){
    $docRefPrefix = SystemConfig::config('ofc_prefix');
    $epFormat = SystemConfig::config('ofc_ref_format');
    $sn = Notation::where('type', 'office')->count() + 1;
    $ref = str_replace("{PREFIX}", $docRefPrefix, $epFormat);
    $ref = str_replace("{YEAR}", date('Y'), $ref);
    $ref = str_replace("{SN}", sprintf("%0".SystemConfig::config('ofc_positions')."d", $sn), $ref);
    return $ref;
  }

  public function computeRef(){
    switch ($this->type) {
      case 'storage':
      $ref = Notation::_getNewStorageControlRef();
      break;

      case 'kitchen':
      $ref = Notation::_getNewKitchenControlRef();
      break;

      case 'reception':
      $ref = Notation::_getNewReceptionControlRef();
      break;

      case 'restaurant':
      $ref = Notation::_getNewRestaurantControlRef();
      break;

      case 'rooms':
      $ref = Notation::_getNewRoomsControlRef();
      break;

      case 'laundry':
      $ref = Notation::_getNewLaundryControlRef();
      break;

      case 'office':
      $ref = Notation::_getNewLaundryControlRef();
      break;

      default:
      $ref = '';
      break;
    }
    $this->ref = $ref;
    $this->save();
  }

  public static function new($request){
    if($request->post()){
      $scores = Notation::prepareScores($request);
      $data = Notation::prepareData($request);
      $scoresDetails = json_encode($scores['details']);
      $totalScore = $scores['total'];
      $notation = Notation::create([
        'control_date' => date('Y-m-d'),
        'type' => $request->controlType,
        'data' => $data,
        'scores' => $scoresDetails,
        'total_score' => $totalScore,
        'created_by' => Auth::user()->id,
        'comments' => $request->comments,
      ]);
      $notation->computeRef();

      return $notation;
    }
  }

  public function reaction(){
    $score = $this->total_score;
    $reaction = '';
    if($score >= 0 && $score < 4){
      $reaction = asset('frontend/assets/images/rating/sad.png');
    }elseif ($score >= 4 && $score < 6) {
      $reaction = asset('frontend/assets/images/rating/meh.png');
    }elseif ($score >=6 && $score <=10) {
      $reaction = asset('frontend/assets/images/rating/happy.png');
    }
    echo $reaction;
  }

  public static function lastKitchenControlDate(){
    $record = Notation::where('type', 'kitchen')->latest()->first();
    if($record){
      return Carbon::parse($record->control_date)->isoFormat(config('ebs.dates.isoFormat'));
    }else{
      return "/";
    }
  }

  public static function lastReceptionControlDate(){
    $record = Notation::where('type', 'reception')->latest()->first();
    if($record){
      return Carbon::parse($record->control_date)->isoFormat(config('ebs.dates.isoFormat'));
    }else{
      return "/";
    }
  }

  public static function lastStorageControlDate(){
    $record = Notation::where('type', 'storage')->latest()->first();
    if($record){
      return Carbon::parse($record->control_date)->isoFormat(config('ebs.dates.isoFormat'));
    }else{
      return "/";
    }
  }

  public static function lastRestaurantControlDate(){
    $record = Notation::where('type', 'restaurant')->latest()->first();
    if($record){
      return Carbon::parse($record->control_date)->isoFormat(config('ebs.dates.isoFormat'));
    }else{
      return "/";
    }
  }

  public static function lastSupplierControlDate(){
    $record = Notation::where('type', 'suppliers')->latest()->first();
    if($record){
      return Carbon::parse($record->control_date)->isoFormat(config('ebs.dates.isoFormat'));
    }else{
      return "/";
    }
  }

  public static function lastRoomControlDate(){
    $record = Notation::where('type', 'rooms')->latest()->first();
    if($record){
      return Carbon::parse($record->control_date)->isoFormat(config('ebs.dates.isoFormat'));
    }else{
      return "/";
    }
  }

  public static function lastLaundryControlDate(){
    $record = Notation::where('type', 'laundry')->latest()->first();
    if($record){
      return Carbon::parse($record->control_date)->isoFormat(config('ebs.dates.isoFormat'));
    }else{
      return "/";
    }
  }

  public static function lastOfficeControlDate(){
    $record = Notation::where('type', 'office')->latest()->first();
    if($record){
      return Carbon::parse($record->control_date)->isoFormat(config('ebs.dates.isoFormat'));
    }else{
      return "/";
    }
  }

  public function controlDate(){
    return Carbon::parse($this->control_date)->isoFormat(config('ebs.dates.isoFormat'));
  }

  public function type(){
    switch ($this->type) {
      case 'storage':
      return "Control magasin et stockage";
      break;

      case 'kitchen':
      return "Control cuisine";
      break;

      case 'reception':
      return "Réception marchandises";
      break;

      case 'restaurant':
      return "Control restaurant et foyer";
      break;

      case 'suppliers':
      // code...
      break;

      case 'rooms':
      return "Control des chambres";
      break;

      case 'office':
      return "Control des bureaux et locaux";
      break;

      case 'laundry':
      return "Control de blanchisserie";
      break;

      default:
      return '#';
      break;
    }
  }

  public function scoresDisplay(){
    $dbScores = json_decode($this->scores, true);
    $response = array();
    foreach($dbScores as $index => $scoreEntry){
      $criteriaName = NotationCriteria::find(array_keys($scoreEntry))->first()->criteria_value;
      $criteriaInfos = array_values($scoreEntry)[0];
      array_push($response, [
        'criteria_name' => $criteriaName,
        'criteria_note' => $criteriaInfos['score'],
        'criteria_comment' => $criteriaInfos['comment'],
      ]);
    }
    return $response;
  }

  public static function comment($comment = null){
    if($comment){
      switch ($comment) {
        case 'option-1':
          return "Option 1";
        break;

        case 'option-2':
        return "Option 1";
        break;

        case 'option-3':
        return "Option 1";
        break;

        case 'option-4':
        return "Option 1";
        break;

        case 'option-5':
        return "Option 1";
        break;

        case 'option-6':
        return "Option 1";
        break;

        case 'option-7':
        return "Option 1";
        break;

        case 'option-8':
        return "Option 1";
        break;

        case 'option-9':
        return "Option 1";
        break;

        case 'option-10':
        return "Option 1";
        break;

        default:
          return "#";
        break;
      }
    }
  }


  public function CreatedBy(){
    return $this->belongsTo('App\Models\User', 'created_by', 'id');
  }
}
