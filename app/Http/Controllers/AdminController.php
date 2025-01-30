<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\User;
use App\Models\Category;
//soft delete
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        //
        $todayReservations = Reservation::whereDate('date_emprunt',date('Y-m-d'))->get();
        $todayReservations = $todayReservations->where('state','pending');
        foreach ($todayReservations as $reservation) {
            $reservation->user;
            $reservation->book;
        };
        $allBooks = Book::all()->count();
        $pandingReservations = Reservation::where('state','pending')->count();
        $cancelledReservations = Reservation::where('state','cancelled')->count();
        $reservedReservations = Reservation::where('state','reserved')->count();
        $booksStatistics =[
            'all' => $allBooks,
            'pending' => $pandingReservations,
            'cancelled' => $cancelledReservations,
            'reserved' => $reservedReservations
        ];
        // new 10 users registrations
        $newUsers = User::orderBy('created_at','desc')->take(10)->get();
                // return dd($todayReservations);
        return view('admin.dashboard',compact('todayReservations','booksStatistics','newUsers'));
    }
    public function books()
    {
        //
        $deletedBooks = Book::onlyTrashed()->get();
        $books = book::all();
        return view('admin.books',compact('books','deletedBooks'));

    }
    public function categories(){
        $categories = Category::all();
        return view('admin.categories',compact('categories'));
    }
    // public function reservations(){
    //     $reservations = Reservation::where('state','pending')->get();
    //     return view('admin.reservations',compact('reservations'));
    // }
    public function reservations(){
        $reservations = Reservation::where('state','pending')->get();
        // return dd($reservations);
        return view('admin.reservations',compact('reservations'));
    }
    public function profile(){
        return view('admin.profile');
    }
}
