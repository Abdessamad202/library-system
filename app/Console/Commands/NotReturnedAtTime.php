<?php

namespace App\Console\Commands;

use App\Mail\NotReturnedReservationMail;
use App\Models\Reservation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotReturnedAtTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservation:n-r-a-t';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $reservations = Reservation::where('state', 'reserved')
            ->where(function ($query) {
                $query->where('date_emprunt', '<', today())
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('date_emprunt', today())
                            ->where('hour_emprunt', '<', now()->format('H:i:s'));
                    });
            })
            ->with(['user', 'book'])->get();
        foreach ($reservations as $reservation) {
            $reservation->state = 'not returned';
            $reservation->save();
            Mail::to($reservation->user->email)->send(new NotReturnedReservationMail($reservation));
        }
    }
}
