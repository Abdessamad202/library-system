<?php

namespace App\View\Components;

use Closure;
use App\Models\Book;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class heroSection extends Component
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
        $books = Book::take(5)->get();
        return view('components.heroSection' , compact('books'));
    }
}
