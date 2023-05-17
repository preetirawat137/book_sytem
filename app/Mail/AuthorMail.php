<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AuthorMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $author;
    protected $book;
    /**
     * Create a new message instance.
     */
    public function __construct($author, $book)
    {
        $this->author=$author;
        $this->book=$book;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Author Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('email.test')
                    ->with([
                        'author' => $this->author,
                        'books' => $this->book
                    ])
                    ->subject('New Book Release Notification');
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
