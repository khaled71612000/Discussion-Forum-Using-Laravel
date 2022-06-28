<?php

namespace App\Notifications;

use App\Discussion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

// for sync
class NewReplyAdded extends Notification implements ShouldQueue
{
    use Queueable;



/**
 *   reply discussion
 *     @var Discussion
 * 
 */
    public $discussion;



    /**
     * Create a new notification instance.
     *
     * @return void
     */

    //  inject so we know which one
    public function __construct(Discussion $discussion)
    {
        $this->discussion = $discussion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */


    //  use mail channel
    public function via($notifiable)
    {
        // mail and database
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    //  what mail contains
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A new reply was added')
                    ->action('View Discussion', route('discussions.show',$this->discussion->slug))
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
            'discussion' => $this->discussion
        ];
    }
}
