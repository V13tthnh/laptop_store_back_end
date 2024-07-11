<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderShippedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cảm ơn bạn đã mua hàng, dưới đây là thông tin đơn hàng của bạn, vui lòng kiểm tra thật kỹ thông tin.',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.shipped',
            with: ['order' => $this->order]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
