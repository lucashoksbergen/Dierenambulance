<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', LoginController::class )->name('login.attempt');

//TESTING HERE v ----------------

Route::get('/password/reset', function () {
    return view('welcome');
})->name('password.request');

//END TESTING ----------------