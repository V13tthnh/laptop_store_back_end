<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Mail;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $account;
    public function __construct($account)
    {
        $this->account = $account;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác nhận Mail đăng ký',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.register-mail',
            with: ['account' => $this->account]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
