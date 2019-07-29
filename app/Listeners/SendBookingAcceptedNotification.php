<?php

namespace App\Listeners;

use App\Events\BookingAccepted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BookingAcceptedNotification;

class SendBookingAcceptedNotification
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
     * @param  BookingAccepted  $event
     * @return void
     */
    public function handle(BookingAccepted $event)
    {
      $booking = $event->booking;
      Notification::route('mail', $booking->email)
                  ->notify(new BookingAcceptedNotification($booking));
    }
}
