<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\sendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\PasswordUpdateRequest;

class UserController extends Controller
{
    //

    public function updateProfile(UpdateProfileRequest $request)
    {
        $filables = $request->validated();

        $filables["image"] = $request->file("image")->store("", "public");
        $user = Auth::user();
        $user->update($filables);

        return redirect()->back()->with("success", "the profile updated successfuly");
    }
    public function updatePassword(PasswordUpdateRequest $request)
    {
        $filables = $request->validated();
        if (Hash::check($filables["current_password"], Auth::user()->password)) {
            // return dd("true");
            $newPassword = Hash::make($filables["new_password"]);
            Auth::user()->update(['password' => $newPassword]);
            return redirect()->back()->with("success", "Password updated successfully");
        } else {
            return redirect()->back()->with("error", "Current password is incorrect");
        }
    }
    public function mailConfirm()
    {
        $user = Auth::user();
        $token = base64_encode($user->id . "///" . $user->created_at);
        sendMail::dispatch($token, $user);
        // return dd($token);
        return redirect()->back()->with("success", "Email confirmation sent successfully , check your email");
    }
    public function mailVerify($token)
    {
        $token = base64_decode($token);
        $id = explode("///", $token)[0];
        $created_at = explode("///", $token)[1];
        $user = User::find($id);
        if ($user->created_at == $created_at) {
            $user->email_verified_at = now();
            $user->save();
            return redirect()->back()->with("success", "Email verified successfully");
        }
    }

    public function changeEmail(Request $request)
    {
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            $user->email = $request->email;
            $user->save();
            return redirect()->back()->with("success", "Email updated successfully");
        } else {
            return redirect()->back()->with("error", "Password is incorrect");
        }
    }
    public function switchRole()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $user->role = 'user';
            $user->save();
            return redirect()->route("home")->with('success', 'Now you are in User Mode.');
        } else {
            $user->role = 'admin';
            $user->save();
            return redirect()->route('admin.dashboard')->with('success', 'Now you are in Admin Mode.');
        }
    }
    public function changeRole(User $user) {
        if ($user->role === 'user') {
            $user->role = 'admin';
            $user->isAdmin = true;
        }else{
            $user->role = 'user';
            $user->isAdmin = false;
        }
        // return dd($user);
        $user->update();
        return redirect()->back()->with("success","the user role has been changed successfuly");
    }
}
