<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    // Define the fillable properties
    use HasFactory;
    protected $fillable = ["name", "description"];

    // Define the relationship with the Book model
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
