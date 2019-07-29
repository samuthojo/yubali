<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\BookingCancelled' => [
          'App\Listeners\SendBookingCancelledNotification',
        ],
        'App\Events\BookingAccepted' => [
          'App\Listeners\SendBookingAcceptedNotification',
        ],
        'App\Events\ApplicationCancelled' => [
          'App\Listeners\SendApplicationCancelledNotification',
        ],
        'App\Events\ApplicationAccepted' => [
          'App\Listeners\SendApplicationAcceptedNotification',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
