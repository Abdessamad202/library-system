<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;
use App\Models\ReservationBooks;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReserveRequest $request)
    {
        Reservation::create(["date_emprunt" => $request->date_emprunt,"hour_emprunt" => $request->hour_emprunt,"user_id" => Auth::user()->id]);
        //
        ReservationBooks::create(["book_id" => $request->book_id,"reservation_id" => Reservation::latest()->first()->id]);
        return response()->json(["success" => true,"message" => "Reservation created successfully"]);
    }
    public function cancel(Reservation $reservation)
    {
        $reservation->state = "cancelled";
        $reservation->save();
        return redirect()->route("reservation")->with("success","Reservation cancelled successfully");
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
