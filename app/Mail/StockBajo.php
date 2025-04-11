<?php

namespace App\Mail;

use App\Models\Producto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StockBajo extends Mailable
{
    use Queueable, SerializesModels;
    public $producto;

    /**
     * Create a new message instance.
     */
    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
    }

    public function build()
    {
        return $this->view('emails.stock_bajo');
            
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Stock Bajo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.stock_bajo',
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
