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
    public function profile(){
        return view('front.profile');
    }
}
