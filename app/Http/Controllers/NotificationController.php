<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExitPermission;
use App\Models\DatabaseNotification;
class NotificationController extends Controller
{
  public function handleNotificationClick(Request $request, $notif_id = null){
    if(!$notif_id){
      abort(404);
    }
    $notification = DatabaseNotification::find($notif_id);
    if(!$notification){
      abort(404);
    }
    $notification->markAsRead();
    switch ($notification->type) {
      case 'new_exit_permission_requested':
        $exitPermissionId = $notification->data->exitPermission->id;
        $exitPermissionRecord = ExitPermission::find($exitPermissionId);
        if(!$exitPermissionRecord){
          abort(404);
        }
        return redirect(route('admin.ExitPermissions.single', $exitPermissionId));
      break;

      default:
      // code...
      break;
    }
  }
}
