<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail yêu cầu đổi mật khẩu',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.forgot-password',
            with: ['token' => $this->token]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
