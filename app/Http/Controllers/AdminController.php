<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
//soft delete
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
        return view('admin.dashboard');
    }
    public function books()
    {
        //
        $deletedBooks = Book::onlyTrashed()->get();
        $books = book::all();
        return view('admin.books',compact('books','deletedBooks'));

    }
    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('admin.books')->with('success','Book deleted successfully');
    }
    public function restore(Book $book){

        $book->restore();
        // return ;
        return redirect()->route('admin.books')->with('success','Book restored successfully');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
