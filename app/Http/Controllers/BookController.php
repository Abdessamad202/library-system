<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(BookRequest $request)
    {
        Book::create($request->validated());
        return redirect()->route('admin.books')->with('success','Book created successfully');
    }
    public function restore(Book $book){
        $book->restore();
        return redirect()->route('admin.books')->with('success','Book restored successfully');
    }
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return redirect()->route('admin.books')->with('success','Book updated successfully');
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books')->with('success','Book deleted successfully');
    }
}
