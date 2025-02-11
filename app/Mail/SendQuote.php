<?php

namespace App\Mail;

use App\Enums\QuoteEnum;
use App\Models\Logic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendQuote extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $logic = Logic::class;
    public $icon;
    public $link;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->icon = base64_encode(file_get_contents(public_path('default/logo.png')));
        $this->link = QuoteEnum::URL->value . $data->id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Quote',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.send-quote',
            with: [
                'data' => $this->data,
                'charge' => $this->logic::first()->charge,
                'icon' => $this->icon,
                'link' => $this->link
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

