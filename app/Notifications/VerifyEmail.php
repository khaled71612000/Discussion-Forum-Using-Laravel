<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Notifications\VerifyEmail as baseVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

// everytime is notifciton is sent its queued
class VerifyEmail extends baseVerifyEmail implements ShouldQueue
{
    use Queueable;

}
