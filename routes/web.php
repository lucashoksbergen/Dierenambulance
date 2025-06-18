<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // If the user is authenticated, redirect to the dashboard
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    // If not authenticated, redirect to the home page
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Home route
Route::get('/home', function () {
    return view('welcome');
})->name('home');

// Authentication routes
Route::middleware('throttle:api')->group(function () { // Rate limited
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
});

Route::post('/login', [AuthController::class, 'login'])->middleware('custom.remember')->name('login'); // Custom middleware to handle remember me functionality

//Protected routes
Route::middleware(['auth'])->group(function () {

    // Protected routes go here
    Route::get('/dashboard', [ReportController::class, 'index'])->name('dashboard');

    Route::get('/transfer/logout', [AuthController::class, 'transferFormLogout'])->name('transfer.form.logout');
    Route::get('/transfer/login', [AuthController::class, 'transferFormLogin'])->name('transfer.form.login');

    Route::post('/transfer/logout', [AuthController::class, 'handleLogout'])->name('transfer.logout');
    Route::post('/transfer/login', [AuthController::class, 'handleLogin'])->name('transfer.login');


});


//TESTING HERE v ----------------

Route::get('/password/reset', function () {
    return view('welcome');
})->name('password.request');

//END TESTING ----------------

