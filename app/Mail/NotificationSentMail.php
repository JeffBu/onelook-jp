<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationSentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $content)
    {
        $this->user = $user;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('【OneLook】会員様への個別連絡')->markdown('emails.private-notification-email');
    }
}
