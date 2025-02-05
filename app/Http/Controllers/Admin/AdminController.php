<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\User;
use App\Models\Category;
//soft delete
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        // Today's date
        $today = date('Y-m-d');

        // Get today's pending reservations with eager loading for user and book
        $todayReservations = Reservation::whereDate('date_emprunt', $today)
            ->where('state', 'pending')
            ->with(['user', 'book'])
            ->get();

        // Get today's returns
        $todayReturns = Reservation::whereDate('date_retour', $today)
            ->where('state', 'reserved') // Assuming 'reserved' state means the book is currently borrowed
            ->with(['user', 'book'])
            ->get();
        // Book statistics
        $allBooks = Book::sum('stock'); // Total stock of all books
        $availableBooks = Book::sum('stock') - Book::sum('reserved_number'); // Count books with stock greater than 0
        $pendingReservations = Reservation::where('state', 'pending')->count();
        $cancelledReservations = Reservation::where('state', 'cancelled')->count();
        $expiredReservations = Reservation::where('state', 'expired')->count();
        $reservedReservations = Reservation::where('state', 'reserved')->count();
        $returnedReservations = Reservation::where('state', 'returned')->count();
        $notReturnedReservations = Reservation::where('state', 'not returned')->count();
        $booksStatistics = [
            'all' => $allBooks,
            'available' => $availableBooks,
            'pending' => $pendingReservations,
            'cancelled' => $cancelledReservations,
            'expired' => $expiredReservations,
            'reserved' => $reservedReservations,
            'not_returned' => $notReturnedReservations,
            'returned' => $returnedReservations,
        ];

        // Get the 10 most recent user registrations
        $newUsers = User::orderBy('created_at', 'desc')->take(10)->get();

        // Return the view with the collected data
        return view('pages.admin.dashboard', compact(
            'todayReservations',
            'todayReturns',
            'booksStatistics',
            'newUsers'
        ));
    }
    public function settings()
    {
        return view('pages.admin.settings');
    }
    public function users()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('pages.admin.users', compact('users'));
    }
    public function books()
    {
        // Fetch soft-deleted books
        $deletedBooks = Book::onlyTrashed()->get();

        // Fetch all books with their associated category (eager loading)
        $books = Book::with('category')->get();
        $categories = Category::all();
        // Pass the data to the view
        return view('pages.admin.books', compact('books', 'deletedBooks', 'categories'));
    }
    public function categories()
    {
        $categories = Category::all();
        return view('pages.admin.categories', compact('categories'));
    }
    // public function reservations(){
    //     $reservations = Reservation::where('state','pending')->get();
    //     return view('pages.admin.reservations',compact('reservations'));
    // }
    public function reservations()
    {
        $reservations = Reservation::where('state', 'pending')->get();
        $returned = Reservation::where('state', 'reserved')->get();
        // return dd($reservations);
        return view('pages.admin.reservations', compact('reservations', 'returned'));
    }
    public function profile()
    {
        return view('pages.admin.profile');
    }
}
