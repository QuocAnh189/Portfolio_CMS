<?php

namespace App\Domains\User\Repositories;

use App\Domains\User\Models\User;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }
}
