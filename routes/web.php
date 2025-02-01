<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\adminMiddleware;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [App\Http\Controllers\UserController::class, "loginView"]);
Route::post('/register', [App\Http\Controllers\UserController::class, "register"])->name("register");
Route::post('/login', [App\Http\Controllers\API\UserController::class, "login"])->name("login");
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');


Route::get('/home', [AuthController::class, "home"])->name("home")->middleware("user");
// Routes for authenticated users
Route::middleware('user')->group(function () {
    // Profile and settings pages
    Route::get('/profile', [AuthController::class, 'profileView'])->name('profile');
    Route::get('/settings', [AuthController::class, 'settingsView'])->name('settings');

    // Email verification route
    Route::get("/mailVerify/{token}", [App\Http\Controllers\UserController::class, 'mailVerify'])->name('mail.verify');

    // Reservation route
    Route::get('/reservation', [AuthController::class, 'reservationView'])->name('reservation');
    Route::get("/books-search", [AuthController::class, "booksSearchView"])->name("books.search");
    Route::get("/book/{book}", [AuthController::class, "bookView"])->name("book");
    Route::get("/category/{category}", [AuthController::class, "categoryView"])->name("category");
});

// Routes for general book and category views (no authentication needed)


Route::middleware(['auth'])->group(function () {
    // Profile and email update routes
    Route::post('/profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/updatePassword', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('password.update');
    Route::post("/mailConfirm", [App\Http\Controllers\UserController::class, 'mailConfirm'])->name('mail.confirm');
    Route::post('/changeEmail', [App\Http\Controllers\UserController::class, 'changeEmail'])->name('email.change');
    Route::post('/roleChanging', [App\Http\Controllers\UserController::class, 'switchRole'])->name('role.change');

    // Reservation routes
    Route::post("/reserve", [ReservationController::class, "store"])->name("reserve");
    Route::post("/cancel/{reservation}", [ReservationController::class, "cancel"])->name("cancel");
    Route::post("/reserved/{reservation}", [ReservationController::class, "reserved"])->name("reserved");
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
