<?php

namespace App\Http\Controllers;

use App\DTOs\LoginData;
use App\DTOs\LoginTransferData;
use App\DTOs\LogoutTransferData;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LoginTransferRequest;
use App\Http\Requests\LogoutTransferRequest;
use App\Services\AuthService;
use App\Services\TransferService;

class AuthController extends Controller
{

    public function __construct(protected TransferService $transferService, protected AuthService $authService)
    {
    }


    public function showLogin()
    {
        // Return the login view
        return view('auth.login');
    }


    public function login(LoginRequest $request)
    {
        $dto = LoginData::fromRequest($request);

        $this->authService->login($dto);

        $request->session()->regenerate();
        
        return redirect()->route('transfer.form.login');
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

        $dto = LogoutTransferData::fromRequest($request);

        $this->transferService->transferOnLogout($dto);

        $this->authService->logout($request);

        return redirect()->route('show.login');
    }


    public function handleLogin(LoginTransferRequest $request)
    {
        $dto = LoginTransferData::fromRequest($request);

        $this->transferService->transferOnLogin($dto);

        return redirect()->route('dashboard');

    }

}
