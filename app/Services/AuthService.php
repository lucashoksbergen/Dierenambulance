<?php

namespace App\Services;

use App\DTOs\LoginData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Cookie;

class AuthService
{

    public function login(LoginData $dto)
    {

        // Attempt to log the user in
        if (
            !Auth::attempt([
                'email' => $dto->email,
                'password' => $dto->password,
            ], $dto->remember)
        ) {
            throw ValidationException::withMessages([
                'error' => 'The provided credentials do not match our records.',
            ]);
        }

    }

    public function logout(Request $request)
    {

        Auth::logout();
        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::queue(Cookie::forget(Auth::getRecallerName()));
        // Redirect to the login page
        return redirect()->route('show.login');

    }


}