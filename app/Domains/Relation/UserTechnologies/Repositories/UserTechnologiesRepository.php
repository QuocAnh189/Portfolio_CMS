<?php

namespace App\Domains\Relation\UserTechnologies\Repositories;

use App\Domains\Relation\UserTechnologies\Models\UserTechnologies;

class UserTechnologiesRepository
{
    public function __construct()
    {
        //
    }

    public function findAll()
    {
        return UserTechnologies::where('status', 'active')->get();
    }

    public function findUserTechnologiesByUserIdAndTechnologyId($userId, $technologyId)
    {
        return UserTechnologies::where('user_id', $userId)->where('technology_id', $technologyId)->first();
    }

    public function createUserTechnologies($createUserTechnologiesDto): UserTechnologies
    {
        return UserTechnologies::create($createUserTechnologiesDto);
    }

    public function updateUserTechnologies($updateUserTechnologiesDto, UserTechnologies $userTechnologies)
    {
        return $userTechnologies->update($updateUserTechnologiesDto);
    }

    public function deleteUserTechnologies(UserTechnologies $userTechnologies)
    {
        return $userTechnologies->delete();
    }

    public function changeStatusUserTechnologies($userTechnologiesId, $status)
    {
        $userTechnologies = UserTechnologies::findOrFail($userTechnologiesId);
        $userTechnologies->status = $status === 'true' ? 'active' : 'inactive';

        return $userTechnologies->save();
    }
}
