<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function __invoke (Request $request): RedirectResponse
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended("welcome");


        }

        return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');

    }
    
}
