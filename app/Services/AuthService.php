<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return compact('user', 'token');
    }

    public function login($data)
    {
        if (!Auth::attempt($data)) {
            return null;
        }

        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;

        return compact('user', 'token');
    }
}
