<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReserveRequest;
use App\Mail\ConfirmationReservationMail;
use App\Mail\ReservedMail;
use App\Mail\ReturnedMail;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function store(ReserveRequest $request)
{
    // Find the book and check if it exists
    $book = Book::find($request->book_id);
    if (!$book) {
        return response()->json([
            "success" => false,
            "message" => "Book not found."
        ], 404);
    }
    // Create the reservation
    $reservation = Reservation::create([
        "date_emprunt" => $request->date_emprunt,
        "hour_emprunt" => $request->hour_emprunt,
        "user_id" => Auth::id(),
        "book_id" => $request->book_id,
    ]);

    // Increment the book's reserved number
    $book->reserved_number += 1;
    $book->save();

    // Load the relationships and send the email
    $reservation->load('user', 'book');
    Mail::to($reservation->user->email)->send(new ReservedMail($reservation));

    return response()->json([
        "success" => true,
        "message" => "Reservation created successfully."
    ]);
}

    public function cancel(Reservation $reservation)
    {
        $book = Book::find($reservation->book_id);
        $book->reserved_number -= 1;
        $book->save();
        // return dd();
        $reservation->state = "cancelled";
        $reservation->save();
        return redirect()->route("reservation")->with("success", "Reservation cancelled successfully");
    }
    public function reserved(Reservation $reservation)
    {
        $reservation->state = "reserved";
        $reservation->date_retour = now()->addDays(7)->toDateString();
        $reservation->hour_retour = now()->addDays(7)->toTimeString();
        $reservation->save();
        $reservation->with(['user', 'book']);
        Mail::to($reservation->user->email)->send(new ConfirmationReservationMail($reservation));
        return redirect()->route("admin.dashboard")->with("success", "Reservation reserved successfully");
    }
    public function returned(Reservation $reservation)
    {
        $reservation->state = "returned";
        $reservation->save();
        $reservation->with(['book']);
        $reservation->book->reserved_number -= 1;
        $reservation->book->save();
        Mail::to($reservation->user->email)->send(new ReturnedMail($reservation));
        return redirect()->route("admin.dashboard")->with("success", "Reservation returned successfully");
    }
    /**
     * Display the specified resource.
     */

    // public function reservationsExpired (){
    //     $reservations = Reservation::where('state','expired')->get();
    //     return view('pages.admin.reservations',compact('reservations'));
    // }
    public function show(Reservation $reservation)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
