<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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