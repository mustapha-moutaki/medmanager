<?php

namespace App\Services;

use App\Repositories\ForgetPasswordRepository;

class forgetPasswordService
{
    protected ForgetPasswordRepository $forgetPasswordRepository;

    public function __construct(ForgetPasswordRepository $forgetPasswordRepository)
    {
        $this->forgetPasswordRepository = $forgetPasswordRepository;
    }

    public function sendResetLink(string $email): string
    {
        return $this->forgetPasswordRepository->sendResetLink($email);
    }
}