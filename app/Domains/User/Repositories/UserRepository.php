<?php

namespace App\Domains\User\Repositories;

use App\Domains\User\Models\User;
use App\Enum\Role;
use App\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function getUser()
    {
        return $this->model->with('profile')->get();
    }

    public function countAll()
    {
        return $this->model->where("role", Role::User->value)->count();
    }
}
