<?php

namespace App\Http\Controllers;
use App\Models\Book;

use App\Models\Category;
use App\Models\Reservation;
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
        return view('pages.user.home', compact('categories','books')); // Ensure 'front.home' exists
    }
    public function profileView(){
        return view('front.profile');
    }
    public function settingsView(){
        return view('front.settings');
    }
    public function reservationView(){
        $history = Reservation::where('user_id',Auth::user()->id)->get();
        foreach ($history as $reservation) {
            $reservation->book;
        }
        $recent = $history->where('state',"!=",'cancelled');
        // return dd($history,$recent);
        return view('front.reservation',compact('recent','history'));
    }

    public function bookView(Book $book){
        if (Reservation::where([
            ['book_id', '=', $book->id],
            ['user_id', '=', Auth::id()],
        ])->exists()) {
        $book->reserved = true;
    }

        $relatedBooks = $book->category->books->take(5);
        return view('front.book',compact('relatedBooks','book'));
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

    // public function reservation(){
    //     return view('front.reservation');
    // }
//notebook
}
