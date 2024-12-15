<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationBooks extends Model
{
    //
    protected $table = 'reservation_books';
    protected $fillable = [
        'reservation_id',
        'book_id',
    ];
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
