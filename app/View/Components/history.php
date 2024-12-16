<?php

namespace App\View\Components;

use Closure;
use App\Models\Book;
use Illuminate\View\Component;
use App\Models\ReservationBooks;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class history extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $reservations = Auth::user()->reservations;
        foreach ($reservations as $reservation) {
            $ReservationBooks = ReservationBooks::where('reservation_id', $reservation->id)->get();
            $book = Book::find($ReservationBooks[0]->book_id);
            $reservation->book = $book;
        }
        return view('components.history',compact('reservations'));
    }
}
