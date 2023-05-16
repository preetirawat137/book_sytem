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

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
protected  $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data=$data;
        // dd($this->data);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // $email = new AuthorMail();
        // Mail::to($this->details['email'])->send($email);

        Mail::send(['html'=>'email.test'], [], function($message)
    
            {

            $message->to('nriya5892@gmail.com', 'John')

            ->subject('This is test email.');

            $message->from('preetirawatwins@gmail.com','LaravelQueue');

            });
    }

}