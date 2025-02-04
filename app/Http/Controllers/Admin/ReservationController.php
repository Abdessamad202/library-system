<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReserveRequest;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(ReserveRequest $request)
    {
        Reservation::create(["date_emprunt" => $request->date_emprunt,"hour_emprunt" => $request->hour_emprunt,"user_id" => Auth::user()->id,"book_id" => $request->book_id,]);
        // ReservationBooks::create([,"reservation_id" => Reservation::latest()->first()->id]);
        $book = Book::find($request->book_id);
        $book->reserved_number +=1;
        // $book->reserved = true;
        $book->save();
        return response()->json(["success" => true,"message" => "Reservation created successfully"]);
    }
    public function cancel(Reservation $reservation)
    {
        $book =Book::find($reservation->book_id);
        $book->reserved_number -= 1;
        $book->save();
        // return dd();
        $reservation->state = "cancelled";
        $reservation->save();
        return redirect()->route("reservation")->with("success","Reservation cancelled successfully");
    }
    public function reserved(Reservation $reservation){
        $reservation->state = "reserved";
        $reservation->date_retour = now()->addDays(7)->toDateString();
        $reservation->hour_retour = now()->addDays(7)->toTimeString();
        $reservation->save();
        return redirect()->route("admin.dashboard")->with("success","Reservation reserved successfully");
    }
    public function returned (Reservation $reservation){
        $reservation->state = "returned";
        $reservation->save();
        $book =Book::find($reservation->book_id);
        $book->reserved_number -= 1;
        $book->save();
        return redirect()->route("admin.dashboard")->with("success","Reservation returned successfully");
    }
    /**
     * Display the specified resource.
     */
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
