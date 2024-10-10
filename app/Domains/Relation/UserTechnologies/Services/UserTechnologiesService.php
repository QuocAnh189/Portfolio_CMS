<?php

namespace App\Domains\Relation\UserTechnologies\Services;

use App\Domains\Relation\UserTechnologies\Models\UserTechnologies;
use App\Domains\Relation\UserTechnologies\Repositories\UserTechnologiesRepository;
use App\Models\Traits\UploadImage;

class UserTechnologiesService
{
    use UploadImage;
    private UserTechnologiesRepository $userTechnologiesRepository;
    public function __construct(UserTechnologiesRepository $userTechnologiesRepository)
    {
        $this->userTechnologiesRepository = $userTechnologiesRepository;
    }

    public function countTechnologiesOfUser()
    {
        return $this->userTechnologiesRepository->countOfUser();
    }

    public function getAllUserTechnologies()
    {
        return $this->userTechnologiesRepository->findAll();
    }

    public function checkExistsUserTechnologies($userId, $technologyId)
    {
        return $this->userTechnologiesRepository->findUserTechnologiesByUserIdAndTechnologyId($userId, $technologyId);
    }

    public function createUserTechnologies($createUserTechnologiesDto)
    {
        return $this->userTechnologiesRepository->create($createUserTechnologiesDto);
    }

    public function updateUserTechnologies(UserTechnologies $userTechnologies, $updateUserTechnologiesDto)
    {
        return $this->userTechnologiesRepository->update($userTechnologies->id, $updateUserTechnologiesDto);
    }

    public function deleteUserTechnologies(UserTechnologies $userTechnologies)
    {
        return $this->userTechnologiesRepository->delete($userTechnologies->id);
    }

    public function restoreUserTechnologies(UserTechnologies $userTechnologies)
    {
        return $this->userTechnologiesRepository->restore($userTechnologies);
    }

    public function removeUserTechnologies(UserTechnologies $userTechnologies)
    {
        return $this->userTechnologiesRepository->forceDelete($userTechnologies);
    }

    public function changeStatusUserTechnologies($userTechnologiesId, $status)
    {
        return $this->userTechnologiesRepository->changeStatus($userTechnologiesId, $status);
    }
}
