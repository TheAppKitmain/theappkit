<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\SendMail;
class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $send_mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SendMail $send_mail)
    {
        $this->send_mail = $send_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.mail.sendmail');
    }
}
