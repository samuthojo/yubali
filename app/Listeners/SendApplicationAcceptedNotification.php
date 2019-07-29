<?php

namespace App\Listeners;

use App\Events\ApplicationAccepted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApplicationAcceptedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ApplicationAccepted  $event
     * @return void
     */
    public function handle(ApplicationAccepted $event)
    {
        //
    }
}
