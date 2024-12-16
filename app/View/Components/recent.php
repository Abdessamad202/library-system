<?php

namespace App\View\Components;

use App\Models\Book;
use App\Models\ReservationBooks;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class recent extends Component
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

        $reservations = Auth::user()->reservations->where('state', 'pending');
        foreach ($reservations as $reservation) {
            $ReservationBooks = ReservationBooks::where('reservation_id', $reservation->id)->get();
            $book = Book::find($ReservationBooks[0]->book_id);
            $reservation->book = $book;
            # code...
        }
        return view('components.recent',compact('reservations'));
    }
}
