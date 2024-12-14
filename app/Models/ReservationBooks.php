<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationBooks extends Model
{
    //
    protected $fillable = [
        'reservation_id',
        'book_id',
    ];
}
