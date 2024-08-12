<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;

class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Application Created',
            from: new Address('example@example.com', 'Jeffrey '),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.application-created', // Corrected view path
        );
    }


    // public function attachments(): array
    // {
    //     return [
    //        if(! is_null($this->application->file_url)){
    //         Attachment::fromStorageDisk('public', $this->application->file_url);
    //        }
    //     ];
    // }
    public function attachments(): array
    {
        $mail = [];

        if (!is_null($this->application->file_url)) {
            $mail[] = Attachment::fromStorageDisk('public', $this->application->file_url);
        }

        return $mail;
    }
}
