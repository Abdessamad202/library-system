<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('connect');
})->name("home");
Route::get('/login', [App\Http\Controllers\UserController::class,"loginView"]);
Route::post('/register', [App\Http\Controllers\UserController::class,"register"])->name("register");
Route::post('/login', [App\Http\Controllers\API\UserController::class,"login"])->name("login");
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::view("/layout", "front.home")->name("layout");
Route::view("/books", "front.books-search")->name("books");