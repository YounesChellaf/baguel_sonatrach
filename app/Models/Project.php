<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model{

  protected $guarded = [];

  public static function new($request){
    if($request->post()){
      Project::create([
        'name' => $request->ProjectName,
        'start_at' => $request->ProjectStartAt,
        'end_at' => $request->ProjectEndsAt,
        'analytic_account' => $request->ProjectAC,
        'site' => $request->ProjectSite,
      ]);
    }
  }
  
  public function status(){
    switch ($this->status) {
      case 'draft':
      echo '<label class="label label-default">Brouillon</label>';
      break;

      case 'in_progress':
      echo '<label class="label label-success">En cours</label>';
      break;

      case 'expired':
      echo '<label class="label label-danger">Expiré</label>';
      break;

      default:
      // code...
      break;
    }
  }
}
