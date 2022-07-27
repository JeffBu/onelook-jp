<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationToWatchVideoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $url, $access_code, $record;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $key, $access_code, $record)
    {
        $this->user = $user;
        $this->url = route('access-video-record', ['video_key' => $key]);
        $this->access_code = $access_code;
        $this->record = $record;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                    ->subject('閲覧者宛の招待メール')
                    ->markdown('emails.invitation-mail');
    }
}
