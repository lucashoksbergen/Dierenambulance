<?php

use App\Http\Controllers\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/form', [FormController::class, 'show'])->name('form');
Route::post('/form', [FormController::class, 'submit'])->name('form.submit');

// Route::post('/form', function (Request $request) {
//     dd($request->all());
// });


//TESTING HERE v ----------------

Route::get('/password/reset', function () {
    return view('welcome');
})->name('password.request');

//END TESTING ----------------