<?php

namespace App\Http\Controllers;

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

class AuthorbookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        $books = Book::with('authors')->get();
        return view('display', compact('books'));



        // $books=Book::find(5);
        // $books->authors()->sync([3,5]);
        // return $books;

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



    public function reviewstore(Request $request)
    {
        // dd($request);
        $review = new Review();
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->user_id = Auth::user()->id;
        $review->book_id = $request->booking_id;
        $review->save();


        $authors = Author::with('books')->get();

     
        
        foreach ($authors as $author) {
            //  dd($author->email);
            // $books = $author->books;
            dispatch(new SendEmailJob($author->email))->delay(now()->addSeconds(20));

        
        }
        
 // return  redirect();
        return Redirect('/attach')->withErrors(['Emails sent to authors.']);

    }

}
