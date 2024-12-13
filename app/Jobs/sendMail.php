<?php

namespace App\Jobs;

use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $token;
    private $user;
    public function __construct($token, $user)
    {
        //
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->user->email)->send(new ConfirmationMail($this->token, $this->user));
    }
}
