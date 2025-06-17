<?php

namespace Tests\Unit;

use App\DTOs\LoginData;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{

    public function test_auth_login_service_is_working(): void
    {
        $dto = new LoginData('test@example.com', 'password', true);


        Auth::shouldReceive('attempt')
            ->once()
            ->with([
                'email' => $dto->email,
                'password' => $dto->password,
            ], $dto->remember)
            ->andReturn(true);

        $authService = app()->make(AuthService::class);
        $authService->login($dto);

        $this->assertTrue(true);
    }

    public function test_auth_login_service_is_not_working(): void
    {
        $dto = new LoginData('test@example.com', 'password', true);
        $authService = app()->make(AuthService::class);


        Auth::shouldReceive('attempt')
            ->once()
            ->with([
                'email' => $dto->email,
                'password' => $dto->password,
            ], $dto->remember)
            ->andReturn(false);

        $authService = app()->make(AuthService::class);

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('The provided credentials do not match our records.');

        $authService->login($dto);

    }

}
