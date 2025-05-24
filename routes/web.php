<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class, 'showLogin'] )->name('show.login');



//TESTING HERE v ----------------

Route::get('/password/reset', function () {
    return view('welcome');
})->name('password.request');

//END TESTING ----------------