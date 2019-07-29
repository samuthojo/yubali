<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Booking;

class BookingCancelledNotification extends Notification
{
    use Queueable;
    
    public $booking;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
      $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {   
      $user = $this->booking->user;
      $member_name = fullName($user->firstname, $user->middlename, $user->lastname); 
      return (new MailMessage)
                ->subject('Yubali - Request Cancelled')
                ->greeting('Hello!')
                ->line($member_name . 'has cancelled your request for the reason(s) explained below:')
                ->line($this->booking->reason)
                ->line('Thank you for using our application!');
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
            //
        ];
    }
}
