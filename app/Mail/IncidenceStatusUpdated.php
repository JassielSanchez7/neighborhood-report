<?php

namespace App\Mail;

use App\Models\Incidence;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;


class IncidenceStatusUpdated extends Mailable
{
    // use Queueable, SerializesModels;

    // public Incidence $incidence;

    /**
     * Create a new message instance.
     */
    // public function __construct(Incidence $incidence)
    // {
        
    //     $this->incidence = $incidence;
    // }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         from: new Address(config('mail.from.address'),config('mail.from.name')),
    //         subject: 'Incidence Actualiza',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'mail.incidence-updated',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }


    public $incidence;

    public function __construct($incidence)
    {
        $this->incidence = $incidence;
    }

    public function build()
    {
        return $this->subject('Actualización de tu incidencia')
            ->view('mail.incidence-updated');
    }


}
