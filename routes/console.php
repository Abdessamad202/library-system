<?php

use App\Console\Commands\ExpiredReservation;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('reservation:expired')->everyMinute();
Schedule::command('reservation:n-r-a-t')->everyMinute();
