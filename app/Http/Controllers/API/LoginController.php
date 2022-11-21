<?php

namespace App\Http\Controllers\API;

use App\Contracts\AuthenticationInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthenticationResource;

class LoginController extends Controller
{
    protected AuthenticationInterface $authentication;

    public function __construct(AuthenticationInterface $authentication)
    {
        $this->authentication = $authentication;
    }

    public function login(LoginRequest $request)
    {
        return new AuthenticationResource([
            'token' => $this->authentication->attemptToLogin($request->validated()),
            'user' => (auth()->user())->toArray()
        ]);
    }

    public function logout(): void
    {
        $this->authentication->logout();
    }
}
