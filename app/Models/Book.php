<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    //
    use HasFactory;
    protected $fillable = ['title', 'author', 'description', 'category_id', 'image', 'date_edition', 'edition', 'stock'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function books()
    {
        return $this->belongsToMany(Book::class, 'reservation_books')
            ->withTimestamps(); // Adds created_at and updated_at timestamps
    }
    // A book can belong to many reservations
    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'reservation_books')
            ->withTimestamps(); // Adds created_at and updated_at timestamps
    }
}
