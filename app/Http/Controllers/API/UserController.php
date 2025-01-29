<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(LoginRequest $request)
{
    // Attempt to authenticate the user
    if (Auth::attempt($request->validated())) {
        // Regenerate the session to prevent session fixation attacks
        $request->session()->regenerate();

        // Determine the redirection route based on the user's role
        $redirectRoute = Auth::user()->role === 'admin' ? '/admin/dashboard' : '/home';

        // Return a JSON response with the redirection route
        return response()->json([
            'route' => $redirectRoute,
        ], 200);
    }

    // If authentication fails, return an error response
    return response()->json([
        'message' => 'The provided credentials do not match our records.',
    ], 401);
}
}
