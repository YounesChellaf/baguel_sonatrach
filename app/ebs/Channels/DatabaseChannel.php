<?php

namespace App\ebs\Channels;
use ReflectionClass;
use App\ebs\Notifications\Notification;
class DatabaseChannel {

  public function send($notifiable, Notification $notification){
    return $notifiable->routeNotificationFor('database', $notification)->create([
      'id' => $notification->id,
      'type' => snake_case($this->getType($notification)),
      'type_class' => get_class($notification),
      'data' => $notification->toArray($notifiable),
      'read_at' => null,
      'models' => json_encode($notification->models()),
    ]);
  }


  protected function getType(Notification $notification){
    return (new ReflectionClass($notification))->getShortName();
  }


}





?>
