<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    //
    use HasFactory;
    protected $fillable = ['title', 'author', 'description', 'category_id', 'image', 'date_edition', 'edition', 'stock'];
}
