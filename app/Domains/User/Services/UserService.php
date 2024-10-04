<?php

namespace App\Domains\User\Services;

use App\Domains\User\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}
