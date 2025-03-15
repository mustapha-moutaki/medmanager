<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'CIN' => $data['CIN'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function login(array $credentials)
    {
        return Auth::attempt($credentials);
    }

    public function logout()
    {
        Auth::logout();
    }

    public function sendPasswordResetLink(string $email)
    {
        return Password::sendResetLink(['email' => $email]);
    }

    public function resetPassword(array $data)
    {
        return Password::reset(
            $data,
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );
    }
}
