<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Http\Request;

class MembershipRefusal extends Notification
{
    use Queueable;

    public $request;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
      $this->request = $request;
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
      if ($this->request->reason) {
        return (new MailMessage)
                    ->subject('Yubali - A request for membership was denied')
                    ->greeting('Hello!')
                    ->line('Applicant name: ' . $this->request->name)
                    ->line('The request for membership was denied at: ' . $this->request->flag . ' level')
                    ->line('The comment was: ' . $this->request->comment)
                    ->line('Reason: ' . $this->request->reason);
      }
        return (new MailMessage)
                    ->subject('Yubali - A request for membership was denied')
                    ->greeting('Hello!')
                    ->line('Applicant name: ' . $this->request->name)
                    ->line('The request for membership was denied at: ' . $this->request->flag . ' level')
                    ->line('The comment was: ' . $this->request->comment);
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
