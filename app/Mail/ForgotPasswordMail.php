<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($target)
    {
        $this->user = $target;
        $this->url = route('update-new-password', ['token' => $target->email_verification_token]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('【OneLook】パスワードのリセット')
                ->markdown('emails.forgot-password');
    }
}
