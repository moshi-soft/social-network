<?php

namespace App\Services;

use App\Contracts\RegistrationInterface;
use App\Models\User;

class RegistrationService implements RegistrationInterface
{
    public function register(array $new_user)
    {
        //dd($new_user['password']);
        return User::create([
            'first_name' => $new_user['first_name'],
            'last_name' => $new_user['last_name'],
            'email' => $new_user['email'],
            'password' => bcrypt($new_user['password']),
        ]);
    }
}
