<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // Define fillable attributes for mass assignment
    protected $fillable = [
        "date_emprunt",
        "hour_emprunt",
        "user_id",
    ];

    // Define the relationship with the User model
    public function reservations()
{
    return $this->belongsToMany(Reservation::class, 'reservation_book', 'book_id', 'reservation_id');
}

}
