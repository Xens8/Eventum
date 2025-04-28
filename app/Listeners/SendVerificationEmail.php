<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;

class SendVerificationEmail
{
    /**
     * Maneja el evento.
     *
     * @param  \App\Events\UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        // Enviar correo de verificación
        Mail::to($event->user->email)->send(new VerifyEmail($event->user));
    }
}

