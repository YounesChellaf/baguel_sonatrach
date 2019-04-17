<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Models\ExitPermission;
use App\ebs\Channels\DatabaseChannel;
use App\ebs\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class newExitPermissionRequested extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public $exitPermission;
    public function __construct(User $user, ExitPermission $exitPermission)
    {
      $this->user = $user;
      $this->exitPermission = $exitPermission;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
          DatabaseChannel::class,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user' => [
              'id' => $this->user->id,
              'fullName' => $this->user->name(),
            ],
            'exitPermission' => [
              'id' => $this->exitPermission->id,
              'requestedAt' => $this->exitPermission->created_at,
            ]
        ];
    }
}
