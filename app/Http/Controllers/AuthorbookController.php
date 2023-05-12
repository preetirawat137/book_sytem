<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorbookController extends Controller
{
    public function index()
    {
        
        $books = Book::with('authors')->get();
        // $books = Book::get();
         return view('display',compact('books'));


    // $books=Book::find(5);
    // $books->authors()->sync([5]);
    // return $books;

// echo "<pre>";
// print_r($books->toArray());
// die;
    }


    public function show($id)
    {
    
        $books=Book::with('Category','genre','authors')->where('id',$id)->get();
        // return $books;
//         echo "<pre>";
// print_r($books->toArray());
// die;

        return view('detail', compact('books'));
    }

}
