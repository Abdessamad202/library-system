<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'author', 'description', 'category_id', 'image', 'date_edition', 'edition', 'stock', 'is_commentable'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // A book can belong to many reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    // A book can have many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }   
    // A book can have many likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
