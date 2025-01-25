<?php

namespace App\Listeners;

use App\Mail\NewMemberRegisteredAdmin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMemberRegistrationEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        Mail::to(config('mail.admin_email'))->send(new NewMemberRegisteredAdmin($event->user));
    }
}
