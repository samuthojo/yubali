<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class AdminAdded extends Notification
{
    use Queueable;
    
    public $user;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
      $this->user = $user;
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
      $user = $this->user;
      $member_name = fullName($user->firstname, $user->middlename, $user->lastname);
      $role_name = $user->roles()->first()->name;
      return (new MailMessage)
                ->subject('Yubali - You were added as ' . $role_name)
                ->greeting('Hello ' . $member_name . ',')
                ->line('Congratulations! You were added as ' . $role_name . '!')
                ->line('Your username is your email address. That is: ' . $user->email)
                ->line('Your password is your last name in capital letters. That is: ' . strtoupper($user->lastname))
                ->line('Please login and reset your password to a stronger one.');
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
