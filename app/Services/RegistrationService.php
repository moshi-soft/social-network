<?php

namespace App\Services;

use App\Contracts\RegistrationInterface;
use App\Models\User;

class RegistrationService implements RegistrationInterface
{
    public function register(array $new_user)
    {
        return User::create([
            'name' => $new_user['name'],
            'email' => $new_user['email'],
            'password' => bcrypt($new_user['password']),
        ]);
    }
}
