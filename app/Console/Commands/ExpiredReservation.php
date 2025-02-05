<?php

namespace App\Console\Commands;

use App\Mail\ExpiredReservationMail;
use App\Models\Reservation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
class ExpiredReservation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservation:expired';

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
        $expiredReservations = Reservation::where('state', 'pending')
            ->where(function ($query) {
                $query->where('date_emprunt', '<', today())
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('date_emprunt', today())
                            ->where('hour_emprunt', '<', now()->format('H:i:s'));
                    });
            });

        foreach ($expiredReservations->get() as $reservation) {
            $reservation->state = 'expired';
            $reservation->save();
            //MAIL
            $reservation->with(['user', 'book']);
            $reservation->book->reserved_number -= 1;
            $reservation->book->save();
            Mail::to($reservation->user->email)->send(new ExpiredReservationMail($reservation));
        }
    }
}
