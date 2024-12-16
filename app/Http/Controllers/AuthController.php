<?php

namespace App\Http\Controllers;
use App\Models\Book;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ReservationBooks;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $books = Book::all()->take(5);
        // return dd($categories);
        return view('front.home', compact('categories','books')); // Ensure 'front.home' exists
    }
    public function profileView(){
        return view('front.profile');
    }
    public function settingsView(){
        return view('front.settings');
    }
    public function reservationView(){
        return view('front.reservation');
    }
    public function bookView(Book $book){
        // return dd($book);
        $book->search = false ;
        $reservations= Auth::user()->reservations->where('state', 'pending');
        foreach ($reservations as $reservation) {
            $ReservationBooks = ReservationBooks::where('reservation_id', $reservation->id)->get();
            $book_id = Book::find($ReservationBooks[0]->book_id)->id;
            if($book_id == $book->id){
                $book->search = true ;
            }
        }
        return view('front.book', compact('book'));
    }
    public function categoryView(Category $category){
        // return dd($category);
        $booksRelated = $category->books->take(5);
        return view('front.category', compact('category','booksRelated'));
    }
    public function booksSearchView(){
        $books = Book::all();
        return view('front.books-search' , compact('books'));
    }
    public function test(){
        $reservations = Auth::user()->reservations();
        return dd($reservations);
    }
    // public function reservation(){
    //     return view('front.reservation');
    // }
}
