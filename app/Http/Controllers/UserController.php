<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateProfileRequest;

class UserController extends Controller
{
    //
    public function loginView()
    {
        return view("login");
    }
    public function register(RegisterRequest $request)
    {
        $filables = $request->validated();
        $filables["password"] = Hash::make($filables["password"]);
        $user = User::create($filables);
        $request->session()->regenerate();
        Auth::login($user);
        return redirect()->route("home");
    }

    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate the session to prevent session fixation attacks
        Session::flush();

        // Regenerate the CSRF token
        // $request->session()->regenerateToken();

        // Redirect the user to the login page or home page
        return redirect()->route('login'); // Change 'login' to the appropriate route name
    }
    public function updateProfile(UpdateProfileRequest $request){
        $filables = $request->validated();

        $filables["image"] = $request->file("image")->store("","public");
        Auth::user()->update($filables);

        return redirect()->route("profile");
    }
}
