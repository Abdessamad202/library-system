<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function store(BookRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('books', 'public');
        $data['image'] = '/storage/' . $data['image'];
        Book::create($data);
        return redirect()->route('admin.books')->with('success', 'Book created successfully');
    }
    public function restore(Book $book)
    {
        $book->restore();
        return redirect()->route('admin.books')->with('success', 'Book restored successfully');
    }
    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();
        $data['is_commentable'] = $request->is_commentable ? 1 : 0;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('books', 'public');
            $data['image'] = '/storage/' . $data['image'];
        }
        $book->update($data);
        return redirect()->route('admin.books')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books')->with('success', 'Book deleted successfully');
    }
}
