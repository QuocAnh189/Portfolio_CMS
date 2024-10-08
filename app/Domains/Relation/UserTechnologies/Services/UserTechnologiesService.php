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
        return $this->userTechnologiesRepository->createUserTechnologies($createUserTechnologiesDto);
    }

    public function updateUserTechnologies(UserTechnologies $userTechnologies, $updateUserTechnologiesDto)
    {
        return $this->userTechnologiesRepository->updateUserTechnologies($updateUserTechnologiesDto, $userTechnologies);
    }

    public function deleteUserTechnologies(UserTechnologies $userTechnologies)
    {
        return $this->userTechnologiesRepository->deleteUserTechnologies($userTechnologies);
    }

    public function changeStatusUserTechnologies($userTechnologiesId, $status)
    {
        return $this->userTechnologiesRepository->changeStatusUserTechnologies($userTechnologiesId, $status);
    }
}
