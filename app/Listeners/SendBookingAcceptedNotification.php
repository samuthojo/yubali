<?php

namespace App\Listeners;

use App\Events\BookingAccepted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BookingAcceptedNotification;
use App\Notifications\DirectorBookingAcceptance;
use App\Role;

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
      // Send email notification to client
      Notification::route('mail', $booking->email)
                  ->notify(new BookingAcceptedNotification($booking));
      
      // Send email notification to executive director
      $role = Role::where('identifier_name', 'executive_director')->first();
      $director_email = $role->users()->first()->email;
      Notification::route('mail', $director_email)
                  ->notify(new DirectorBookingAcceptance($booking));            
    }
}
