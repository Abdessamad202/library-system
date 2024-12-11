<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function home()
    {
        return view('front.home'); // Ensure 'front.home' exists
    }
    public function profileView(){
        return view('front.profile');
    }
    public function settingsView(){
        return view('front.settings');
    }
    public function reservationView(){
        return view('front.reservation');
    }
}
