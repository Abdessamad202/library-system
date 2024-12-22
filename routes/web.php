<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;

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
Route::get("/books-search", [AuthController::class, "booksSearchView"])->name("books.search");

// Route::get("/books/{id}", "front.books-search")->name("books");
Route::get("/book/{book}", [AuthController::class, "bookView"])->name("book");
// Route::view("/category", "front.category")->name("category");
Route::get("/category/{category}", [AuthController::class, "categoryView"])->name("category");
Route::view("/profile", "front.profile")->name("profile");
Route::view("/settings", "front.settings")->name("settings");
// Route::view("/reservation", "front.reservation")->name("reservation");
Route::get("/reservation", [AuthController::class, "reservationView"])->name("reservation");

Route::post("/reserve", [ReservationController::class, "store"] )->name("reserve");
Route::post("/cancel/{reservation}", [ReservationController::class, "cancel"] )->name("cancel");
Route::post("/reserved/{reservation}", [ReservationController::class, "reserved"] )->name("reserved");

Route::get('/test', [AuthController::class, "test"])->name("test");
Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
Route::delete('/admin/destroy/{book}',[AdminController::class,'destroy'])->name('admin.books.destroy');
Route::get('/admin/books',[AdminController::class,'books'])->name('admin.books');

// Route::get('/admin/destroy/{book}',[AdminController::class,'destroy'])->name('admin.destroy');
Route::post('/admin/restore/{book}',[AdminController::class,'restore'])->name('admin.books.restore')->withTrashed();