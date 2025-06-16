<?php

namespace App\Http\Controllers;

use App\DTOs\LoginTransferData;
use App\DTOs\LogoutTransferData;
use App\Http\Requests\LoginTransferRequest;
use App\Http\Requests\LogoutTransferRequest;
use App\Services\TransferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{

    public function __construct(protected TransferService $transferService)
    {
    }


    public function showLogin()
    {
        // Return the login view
        return view('auth.login');
    }


    public function login(Request $request)
    {

        // Validate the request data
        $validated = $request->validate([
            'email' => 'required|email', // Ensure email is required and valid
            'password' => 'required|string', // Ensure password is required and a string
        ]);

        $remember = $request->filled('remember'); // Check if the remember me checkbox is checked

        // Attempt to log the user in
        if (Auth::attempt($validated, $remember)) {

            $request->session()->regenerate();
            // Redirect to the home page
            // return redirect()->route('dashboard');

            // Redirects to transfer first

            return redirect()->route('transfer.form.login');
        }

        // If authentication fails, throw a validation exception
        throw ValidationException::withMessages(
            ['credentials' => 'The provided credentials do not match our records.']
        );

    }


    public function logout()
    {
        return redirect()->route('transfer.form.logout');
    }


    public function transferFormLogout()
    {
        return view('auth.transfer', ['mode' => 'logout']);
    }

    public function transferFormLogin()
    {
        return view('auth.transfer', ['mode' => 'login']);
    }





    public function handleLogout(LogoutTransferRequest $request)
    {
        $dto = new LogoutTransferData(
            $request->vehicle_number,
            $request->materials_check,
            $request->cash_before,
            $request->km_start,
        );

        $this->transferService->transferOnLogout($dto);

        // Logout as normal
        Auth::logout();
        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Redirect to the login page
        Cookie::queue(Cookie::forget(Auth::getRecallerName()));

        return redirect()->route('show.login');
    }


    public function handleLogin(LoginTransferRequest $request)
    {
        $dto = new LoginTransferData(
            $request->vehicle_number,
            $request->materials_check,
            $request->cash_after,
            $request->km_end,
        );

        $this->transferService->transferOnLogin($dto);

        return redirect()->route('dashboard');

    }

}
