<?php

namespace App\Services;

use App\Repositories\Interfaces\AuthRepositoryInterface;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function registerUser(array $data)
    {
        return $this->authRepository->register($data);
    }

    public function loginUser(array $credentials)
    {
        return $this->authRepository->login($credentials);
    }

    public function logoutUser()
    {
        return $this->authRepository->logout();
    }

    public function sendResetLink(string $email)
    {
        return $this->authRepository->sendPasswordResetLink($email);
    }

    public function resetUserPassword(array $data)
    {
        return $this->authRepository->resetPassword($data);
    }
}
