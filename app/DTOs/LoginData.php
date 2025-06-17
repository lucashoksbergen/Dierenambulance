<?php

namespace App\DTOs;

use Illuminate\Http\Request;


class LoginData
{

    public function __construct(
        public string $email,
        public string $password,
        public bool $remember,
    ){}

    public static function fromRequest(Request $request) 
    {
        return new self(
            email: $request->input('email'),
            password: $request->input('password'),
            remember: $request->boolean('remember'),
        );
    }
}