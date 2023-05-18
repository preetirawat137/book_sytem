<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Author;
use App\Models\Book;

class AuthorMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $books, $author, $review;
    //  * Create a new message instance.
    public function __construct($author,  $books, $review)
    {
        $this->author=$author;
        $this->books=$books;
        $this->review=$review;

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
        return $this->view('email.test')->subject('New Book Release Notification')->with(['author'=> $this->author,
        
        'books'=> $this->books, 'review'=> $this->review]);
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
