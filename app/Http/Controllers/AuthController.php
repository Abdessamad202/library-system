<?php

namespace App\Http\Controllers;
use App\Models\Book;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        // return dd($categories);
        return view('front.home', compact('categories')); // Ensure 'front.home' exists
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
        return view('front.book', compact('book'));
    }
    public function categoryView(Category $category){
        // return dd($category);
        return view('front.category', compact('category'));
    }
    public function booksSearchView(){
        $books = Book::all();
        return view('front.books-search' , compact('books'));
    }
    // public function reservation(){
    //     return view('front.reservation');
    // }
}
