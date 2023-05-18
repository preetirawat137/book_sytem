<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJob;
use App\Mail\AuthorMail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendEmailJob;
use Illuminate\Database\Eloquent\Builder;

class AuthorbookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        $books = Book::with('authors')->get();
        return view('display', compact('books'));



        // $books=Book::find(1);
        // $books->authors()->sync([3,2]);
        // return  $books;

        // echo "<pre>";
        // print_r($books->toArray());
        // die;
    }


    public function show($id)
    {

        $books = Book::with('Category', 'genre', 'authors')->where('id', $id)->get();
        // return $books;
        //         echo "<pre>";
        // print_r($books->toArray());
        // die;

        return view('detail', compact('books'));
    }

    public function createreview($id)
    {
        if(Auth::check()){
        $books = Book::with('reviews')->find($id);
        return view('rating', compact('books'));
    }
    return Redirect::route('login');
}
 public function reviewstore(Request $request)    {
        // dd($request);
        $review = new Review();
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->user_id = Auth::user()->id;
        $review->book_id = $request->booking_id;
        $review->save();
       $books= Book::find($request->booking_id)->with('authors')->first();
        $author = Book::where('id', $request->booking_id)->first();

        $email = Author::where('id', $author->author_id )->first(); 

        // dd($email->email);
        //  return $book->email;
            
        // if($books->authors){
            // dd($books->authors);
            // foreach($books->authors as $author){
                dispatch(new EmailJob($email->email))->delay(now()->addSeconds(30));

            // }
        // }
      
        
        
    
        return  redirect('/attach');
        // return Redirect('/attach')->withErrors(['Emails sent to authors.']);

    }

}
