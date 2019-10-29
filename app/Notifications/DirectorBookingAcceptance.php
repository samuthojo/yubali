<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Booking;

class DirectorBookingAcceptance extends Notification
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
                ->subject('Yubali - A member accepted a booking!')
                ->greeting('Hello!')
                ->line($member_name . ' accepted a booking. See the details below:')
                ->line('Service category: ' . service_category($this->booking->service_category))
                ->line('From: ' . nice_date($this->booking->start_date))
                ->line('To: ' . nice_date($this->booking->end_date))
                ->line('Region: ' . $this->booking->region)
                ->line('District: ' . $this->booking->district)
                ->line('Place: ' . $this->booking->place)
                ->line('Contact person: ' . $this->booking->contact_person)
                ->line('Contact person\'s mobile: ' . $this->booking->mobile)
                ->line('Contact person\'s email: ' . $this->booking->email);
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
