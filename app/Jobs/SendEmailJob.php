<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\AuthorMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Review;


class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $books, $author, $review, $email;
    /**
     * Create a new job instance.
     */
    public function __construct($author,  $books, $review)
    {
        $this->review = $review;
        $this->author = $author;
        $this->books = $books;
        $this->email = $author->email;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // $author = $this->author;
        // // // dd(  $author->email) ; 
        // $email = $author->email;
        // dd($email);
        // $review = $this->review;
        // $books = $this->books;
        // $email = new AuthorMail($this->author, $books, $review);
        //  Mail::to($this->$author->email)->send( $email); 
        // Mail::to($this->author->email)->send(new AuthorMail($email, $books, $review));

        Mail::send('authormail', ['data' => $this->email], function ($message) {
            $message->to($this->email)->subject("Review");
        });
    }
}
