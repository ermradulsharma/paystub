<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmailSend extends Mailable
{
    use Queueable, SerializesModels;

    public $pin, $user_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_data)
    {
        $this->user_data = $user_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(MAIL_FROM_EMAIL, config('mail.from.name'))
            ->subject($this->user_data['subject'] . ' - ' . config('mail.from.name'))
            ->markdown('mail.verify')
            ->with(['user_data' => $this->user_data]);
    }
}
