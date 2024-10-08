<?php

namespace App\Domains\Relation\UserTechnologies\Repositories;

use App\Domains\Relation\UserTechnologies\Models\UserTechnologies;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;

class UserTechnologiesRepository extends BaseRepository
{
    public function model()
    {
        return UserTechnologies::class;
    }

    public function findUserTechnologiesByUserIdAndTechnologyId($userId, $technologyId)
    {
        return UserTechnologies::where('user_id', $userId)->where('technology_id', $technologyId)->first();
    }
}
