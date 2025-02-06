<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    //
    use SoftDeletes;
    protected $table = 'likes';
    protected $fillable = ['user_id', 'book_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
