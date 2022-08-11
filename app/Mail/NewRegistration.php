<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $url, $target_email, $target_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $mail, $name)
    {
        $this->url = route('update-password', ['token' => $token]);
        $this->target_email = $mail;
        $this->target_name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->subject('【OneLook】ユーザー登録のお知らせ')
                ->markdown('emails.new-registration');
    }
}
