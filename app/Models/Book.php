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
    protected $fillable = ['title', 'author', 'description', 'category_id', 'image', 'date_edition', 'edition', 'stock'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // A book can belong to many reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
