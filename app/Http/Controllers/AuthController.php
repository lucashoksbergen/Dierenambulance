<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function showLogin(){
        // Return the login view
        return view('auth.login');
    }

    public function login(Request $request){

        // Validate the request data
        $validated = $request->validate([
            'email' => 'required|email', // Ensure email is required and valid
            'password' => 'required|string', // Ensure password is required and a string
        ]);

        // Attempt to log the user in
        if (Auth::attempt($validated)){ 
            // Authentication passed, regenerate the session
            $request->session()->regenerate(); 
            // Redirect to the home page
            return redirect()->route('home');
        }

        // If authentication fails, throw a validation exception
        throw ValidationException::withMessages(
            ['credentials' => 'The provided credentials do not match our records.']
        );

    }

    public function logout(Request $request){
        // Log the user out 
        Auth::logout();
        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Redirect to the login page
        
        return redirect()->route('show.login');
    }
    
}
