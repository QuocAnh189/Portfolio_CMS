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

    public function countAll()
    {
        return $this->model->where("is_admin", 0)->count();
    }
}
