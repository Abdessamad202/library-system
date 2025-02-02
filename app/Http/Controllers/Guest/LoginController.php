<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('pages.guest.login');
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

        return redirect()->route('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['route' =>  $this->getRedirectRoute()]);
        }

        return response()->json([
            'errors' => [
                'email' => ['The provided credentials do not match our records.']
            ]
        ], 422);
    }
protected function getRedirectRoute()
{
    return Auth::user()->role === 'admin' ? route('admin.dashboard') : route('home');
}
}
