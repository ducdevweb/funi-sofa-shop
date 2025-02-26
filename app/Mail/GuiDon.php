<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class GuiDon extends Mailable
{
    use Queueable, SerializesModels;

    public $donhang;
    public $orderDetails; 
    public $tongTien;
    /**
     * Create a new message instance.
     */
    public function __construct($donhang, $orderDetails, $tongTien)
    {
        $this->donhang = $donhang;
        $this->orderDetails=$orderDetails;
        $this->tongTien=$tongTien;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác nhận đơn hàng #' . $this->donhang->maDon,
        );
    }

    /**
     * Get the message content definition.
     */
public function content(): Content
{
    return new Content(
        markdown: 'emails.donhang.chitietdon', 
        with: [
            'donhang' => $this->donhang,
            'orderDetails' => $this->orderDetails,
            'tongTien' => $this->tongTien,
        ],
    );
}


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return []; 
    }
}
