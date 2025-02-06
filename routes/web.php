<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CommentsController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Guest\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\User\LikeController;

Route::get('/login', [LoginController::class, "loginView"]);
Route::post('/register', [LoginController::class, "register"])->name("register");
Route::post('/login', [LoginController::class, "login"])->name("login");
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/home', [AuthController::class, "home"])->name("home")->middleware("user");
// Routes for authenticated users
Route::middleware('user')->group(function () {
    // Profile and settings pages
    Route::get('/profile', [AuthController::class, 'profileView'])->name('profile');
    Route::get('/settings', [AuthController::class, 'settingsView'])->name('settings');

    // Email verification route
    Route::get("/mailVerify/{token}", [UserController::class, 'mailVerify'])->name('mail.verify');

    // Reservation route
    Route::get('/reservation', [AuthController::class, 'reservationView'])->name('reservation');
    Route::get("/books-search", [AuthController::class, "booksSearchView"])->name("books.search");
    Route::get("/book/{book}", [AuthController::class, "bookView"])->name("book");
    Route::get("/category/{category}", [AuthController::class, "categoryView"])->name("category");
});

// Routes for general book and category views (no authentication needed)


Route::middleware(['auth'])->group(function () {
    // Profile and email update routes
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('password.update');
    Route::post("/mailConfirm", [UserController::class, 'mailConfirm'])->name('mail.confirm');
    Route::post('/changeEmail', [UserController::class, 'changeEmail'])->name('email.change');
    Route::post('/roleChanging', [UserController::class, 'switchRole'])->name('role.change');

    // Reservation routes
    Route::post("/reserve", [ReservationController::class, "store"])->name("reserve");
    Route::post("/cancel/{reservation}", [ReservationController::class, "cancel"])->name("cancel");
    Route::post("/reserved/{reservation}", [ReservationController::class, "reserved"])->name("reserved");
    Route::post("/returned/{reservation}", [ReservationController::class, "returned"])->name("returned");
    // delete comment

    Route::post("/addComment/{book}", [CommentsController::class, "store"])->name("comments.store");
    Route::put("/updateComment/{comment}", [CommentsController::class, "update"])->name("comments.update");
    Route::delete("/deleteComment/{comment}", [CommentsController::class, "destroy"])->name("comments.destroy");

    Route::post("/like/{bookId}", [LikeController::class, "toggleLike"])->name("like.toggle");
});


// Route::get("/books/{id}", "front.books-search")->name("books");


// Route::get('/test', [AuthController::class, "test"])->name("test");
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Admin Categories Routes
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::post('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Admin Books Routes
    Route::get('/admin/books', [AdminController::class, 'books'])->name('admin.books');
    Route::post('/admin/books', [BookController::class, 'store'])->name('admin.books.store');
    Route::post('/admin/books/{book}', [BookController::class, 'update'])->name('admin.books.update');
    Route::delete('/admin/books/{book}', [BookController::class, 'destroy'])->name('admin.books.destroy');
    Route::post('/admin/restore/{book}', [BookController::class, 'restore'])->name('admin.books.restore')->withTrashed();

    // Admin Reservations Routes
    Route::get('/admin/reservations', [AdminController::class, 'reservations'])->name('admin.reservations');

    // Admin Profile
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

    // Admin Settings
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/admin/users/change/{user}', [UserController::class, 'changeRole'])->name('admin.users.change');
});
