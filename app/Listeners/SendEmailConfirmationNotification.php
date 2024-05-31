<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmationMail;

class SendEmailConfirmationNotification
{
    public function __construct()
    {
        //
    }

    public function handle(Registered $event)
    {
        Mail::to($event->user->email)->send(new RegistrationConfirmationMail($event->user));
    }
}
