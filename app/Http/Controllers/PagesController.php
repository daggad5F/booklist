<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class PagesController extends Controller
{
    public function home() {
        $books = Book::all();
        return view('home')->with('books', $books);
    }
}
