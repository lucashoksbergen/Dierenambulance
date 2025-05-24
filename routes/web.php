<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login',[AuthController::class, 'showLogin'] )->name('show.login');

Route::post('/login',[AuthController::class, 'login'] )->name('login');

Route::post('/logout',[AuthController::class, 'logout'] )->name('logout');

//TESTING HERE v ----------------

Route::get('/password/reset', function () {
    return view('welcome');
})->name('password.request');

//END TESTING ----------------