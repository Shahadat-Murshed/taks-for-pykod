<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProjectCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public $adminName,
        public $projectName,
        public $userName
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Project Created',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $body = <<<EOD
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>A New project created</title>
            </head>

            <body>

                <p>Dear {$this->adminName},</p>

                <p>A new project named: {$this->projectName} is created by user: {$this->userName}</p>

                <p>Thank you.</p>

            </body>

            </html>
        EOD;

        return new Content(
            htmlString: $body
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
