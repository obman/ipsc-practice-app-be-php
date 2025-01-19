<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IpscVerifyEmail extends VerifyEmail
{
    use Queueable;

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        $baseUrl = config('ipsc.front_end');
        $id = $notifiable->id;
        $hash = sha1($notifiable->email);
        $verifyUrl = "{$baseUrl}/complete-registration?id={$id}&hash={$hash}";

        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Verify Email address', $verifyUrl)
            ->line('Thank you for using our application!')
            ->view('vendor.notifications.email', [
                'user' => $notifiable,
                'verifyUrl' => $verifyUrl
            ])
            ;
    }
}
