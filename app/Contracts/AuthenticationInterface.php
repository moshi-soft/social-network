<?php

namespace App\Contracts;

interface AuthenticationInterface
{
//    public function register(array $user);

    public function attemptToLogin(array $userCredential);

    public function logout(): void;
}
