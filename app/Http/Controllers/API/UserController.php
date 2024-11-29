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
    public function login(LoginRequest $request) {
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();
            $data = [
                "route" => "/home"
            ];
            return response()->json($data, 200);;
        }
    }
}
