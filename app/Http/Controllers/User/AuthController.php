<?php

namespace App\Http\Controllers\User;

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
        return view('pages.user.home', compact('categories', 'books')); // Ensure 'front.home' exists
    }
    public function profileView()
    {
        return view('pages.user.profile');
    }
    public function settingsView()
    {
        return view('pages.user.settings');
    }
    public function reservationView()
    {
        $history = Reservation::where('user_id', Auth::user()->id)->get();
        foreach ($history as $reservation) {
            $reservation->book;
        }
        $recent = $history->where('state', "!=", 'cancelled');
        // return dd($history,$recent);
        return view('pages.user.reservation', compact('recent', 'history'));
    }

    public function bookView(Book $book)
    {
        // Check if the book is reserved or pending for the authenticated user
        $book->reserved = $book->reservations()
            ->where('user_id', Auth::id())
            ->whereIn('state', ['pending', 'reserved'])
            ->exists();

        // Fetch related books, excluding the current book
        $relatedBooks = $book->category
            ->books()
            ->where('id', '!=', $book->id)
            ->take(5)
            ->get();

        return view('pages.user.book', compact('relatedBooks', 'book'));
    }

    public function categoryView(Category $category)
    {
        // return dd($category);
        $booksRelated = $category->books->take(5);
        return view('pages.user.category', compact('category', 'booksRelated'));
    }
    public function booksSearchView()
    {
        $books = Book::all();
        return view('pages.user.books-search', compact('books'));
    }

    // public function reservation(){
    //     return view('front.reservation');
    // }
    //notebook
}
