<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [AuthController::class, "home"])->name("home")->middleware("auth");
Route::get('/profile', [AuthController::class, "profileView"])->name("profile")->middleware("auth");
Route::post('/profile', [App\Http\Controllers\UserController::class, "updateProfile"])->name("profile.update")->middleware("auth");
Route::get('/settings', [AuthController::class, "settingsView"])->name("settings")->middleware("auth");
Route::post('/updatePassword', [App\Http\Controllers\UserController::class, "updatePassword"])->name("password.update")->middleware("auth");
Route::post("/mailConfirm", [App\Http\Controllers\UserController::class, "mailConfirm"])->name("mail.confirm")->middleware("auth");
Route::get("/mailVerify/{token}", [App\Http\Controllers\UserController::class, "mailVerify"])->name("mail.verify")->middleware("auth");

Route::post('/changeEmail', [App\Http\Controllers\UserController::class, "changeEmail"])->name("email.change")->middleware("auth");

Route::get('/reservation', [AuthController::class, "reservationView"])->name("reservation")->middleware("auth");

Route::get('/login', [App\Http\Controllers\UserController::class, "loginView"]);

Route::post('/register', [App\Http\Controllers\UserController::class, "register"])->name("register");
Route::post('/login', [App\Http\Controllers\API\UserController::class, "login"])->name("login");
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::view("/layout", "front.home")->name("layout");
Route::view("/books", "front.books-search")->name("books");
Route::view("/book", "front.book")->name("book");
Route::view("/category", "front.category")->name("category");
Route::view("/profile", "front.profile")->name("profile");
Route::view("/settings", "front.settings")->name("settings");
Route::view("/reservation", "front.reservation")->name("reservation");