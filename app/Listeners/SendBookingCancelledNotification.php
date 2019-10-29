<?php

namespace App\Listeners;

use App\Events\BookingCancelled;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BookingCancelledNotification;
use App\Notifications\DirectorBookingRejection;
use App\Role;

class SendBookingCancelledNotification
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
     * @param  BookingCancelled  $event
     * @return void
     */
    public function handle(BookingCancelled $event)
    {
      $booking = $event->booking;
      Notification::route('mail', $booking->email)
                  ->notify(new BookingCancelledNotification($booking));
      
      // Send email notification to executive director
      $role = Role::where('identifier_name', 'executive_director')->first();
      $director_email = $role->users()->first()->email;
      Notification::route('mail', $director_email)
                  ->notify(new DirectorBookingRejection($booking)); 
    }
}
