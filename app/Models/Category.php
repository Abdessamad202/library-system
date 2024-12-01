<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Define the fillable properties
    protected $fillable = ["name", "description"];

    // Define the relationship with the Book model
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
