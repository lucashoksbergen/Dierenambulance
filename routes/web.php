<?php

use App\Http\Controllers\AuthController;
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

// Home route
Route::get('/home', function () {
    return view('welcome');
})->name('home');

// Authentication routes
Route::get('/login',[AuthController::class, 'showLogin'] )->name('show.login');
Route::post('/login',[AuthController::class, 'login'] )->name('login');
Route::post('/logout',[AuthController::class, 'logout'] )->name('logout');

//Protected routes
Route::middleware('auth')->group(function(){

    // Protected routes go here

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


});


//TESTING HERE v ----------------

Route::get('/password/reset', function () {
    return view('welcome');
})->name('password.request');

//END TESTING ----------------