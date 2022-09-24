<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $old_plan, $updated_plan, $date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $old, $new, $date)
    {
        $this->user = $user;
        $this->old_plan = $old;
        $this->updated_plan = $new;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('【OneLook】サービスプラン変更のお知らせ')->markdown('emails.subscription-update');
    }
}
