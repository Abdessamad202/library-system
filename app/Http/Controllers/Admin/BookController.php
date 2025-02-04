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
        // Get validated data from the request
        $data = $request->validated();

        // Check if a new image file was uploaded
        if ($request->hasFile('image')) {
            // Store the new image and get its path
            $data['image'] = $request->file('image')->store('books', 'public');
            $data['image'] = '/storage/' . $data['image'];
        } else {
            // If no new image, retain the existing image
            $data['image'] = $book->image;
        }

        // Update the book with the data
        $book->update($data);

        // Redirect back with a success message
        return redirect()->route('admin.books')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books')->with('success', 'Book deleted successfully');
    }
}
