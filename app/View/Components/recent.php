<?php

namespace App\View\Components;

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

        $reservations = Auth::user()->reservations()->orderBy('created_at', 'desc')->limit(5)->get();
        return view('components.recent',compact('reservations'));
    }
}
