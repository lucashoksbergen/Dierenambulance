<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    //
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
            session()->flash('came_from', 'login');

            return redirect()->route('transfer');
        }

        // If authentication fails, throw a validation exception
        throw ValidationException::withMessages(
            ['credentials' => 'The provided credentials do not match our records.']
        );

    }

    // public function logout(Request $request)
    // {
    //     // Log the user out 
    //     Auth::logout();
    //     // Invalidate the session and regenerate the CSRF token
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     // Redirect to the login page
    //     Cookie::queue(Cookie::forget(Auth::getRecallerName()));

    //     return redirect()->route('show.login');
    // }
    public function logout()
    {
        session()->flash('came_from', 'logout');
        return redirect()->route('transfer');
    }


    public function transfer()
    {
        return view('auth.transfer');
    }
    // When the initial login happens, cash_before and km_start are not set yet, thus there needs to be a failsafe to have these match the cash_After and km_end if there is no prior entry.

    public function completeTransfer(Request $request)
    {

        $cameFrom = $request->input('came_from');

        if ($cameFrom === 'logout') {

            $validated = $request->validate([
                'vehicle_number' => 'required',
                'materials_check' => 'required|boolean',
                'cash_before' => 'required',
                'km_start' => 'required',
            ]);

            $transfer = Transfer::create([
                'vehicle_id' => $validated['vehicle_number'],
                'materials_check' => $validated['materials_check'],
                'cash_before' => $validated['cash_before'],
                'km_start' => $validated['km_start'],
                'is_done' => false,
            ]);

            // Logout as normal
            Auth::logout();
            // Invalidate the session and regenerate the CSRF token
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            // Redirect to the login page
            Cookie::queue(Cookie::forget(Auth::getRecallerName()));

            return redirect()->route('show.login');

        } else {
            // Came from logging in 
            $validated = $request->validate([
                'vehicle_number' => 'required',
                'materials_check' => 'required|boolean',
                'cash_after' => 'required',
                'km_end' => 'required',
            ]);

            $transfer = Transfer::where('vehicle_id', $validated['vehicle_number'])
                ->where('is_done', false)
                ->first();

            if ($transfer) {
                $transfer->update([
                    'materials_check' => $validated['materials_check'],
                    'cash_after' => $validated['cash_after'],
                    'km_end' => $validated['km_end'],
                    'is_done' => true,
                    'updated_at' => now(),
                ]);
            } else {
                // No other user has logged out yet, so a transfer entry is created instead. This should only happen once per vehicle
                // km_start and cash_before are simply filled with the same data as after/end, since no actual transfer happened
                $transfer = Transfer::create([
                    'vehicle_id' => $validated['vehicle_number'],
                    'materials_check' => $validated['materials_check'],
                    'cash_before' => $validated['cash_after'],
                    'cash_after' => $validated['cash_after'],
                    'km_start' => $validated['km_end'],
                    'km_end' => $validated['km_end'],
                    'is_done' => true,
                ]);
            }

            return redirect()->route('dashboard');

        }

    }

}
