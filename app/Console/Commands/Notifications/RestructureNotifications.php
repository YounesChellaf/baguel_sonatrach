<?php

namespace App\Console\Commands\Notifications;

use Illuminate\Console\Command;
use App\Models\DatabaseNotifcation;
class RestructureNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:restructure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restructuring all database notifications';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $notifications = DatabaseNotifcation::all();
    }
}
