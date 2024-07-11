<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $order;
    public $status;
    public function __construct(User $user, Order $order, $status)
    {
        $this->user = $user;
        $this->order = $order;
        $this->status = $status;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thông báo trạng thái hóa đơn',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.status_notification',
            with: ['order' => $this->order, 'user' => $this->user, 'status' => $this->status]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
