<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\sendMail;
use Illuminate\Http\Request;
use App\Mail\ConfirmationMail;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\PasswordUpdateRequest;

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
    public function updatePassword(PasswordUpdateRequest $request){
        $filables = $request->validated();
        if (Hash::check($filables["current_password"],Auth::user()->password)) {
            // return dd("true");
            $filables["password"] = Hash::make($filables["new_password"]);
            Auth::user()->update($filables);
            return redirect()->route("settings")->with("success","Password updated successfully");
        }
    }
    public function mailConfirm(){
        $user = Auth::user();
        $token = base64_encode($user->id."///".$user->created_at);
        sendMail::dispatch($token, $user);
        // return dd($token);
        return redirect()->route("settings")->with("success","Email confirmation sent successfully , check your email");
    }
    public function mailVerify($token){
        $token = base64_decode($token);
        $id = explode("///", $token)[0];
        $created_at = explode("///", $token)[1];
        $user = User::find($id);
        if ($user->created_at == $created_at) {
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route("settings")->with("success","Email verified successfully");
        }
    }

    public function changeEmail(Request $request){
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            $user->email = $request->email;
            $user->save();
            return redirect()->route("settings")->with("success","Email updated successfully");
        }else{
            return redirect()->route("settings")->with("error","Password is incorrect");
        }
    }
}
