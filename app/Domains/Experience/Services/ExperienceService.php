<?php

namespace App\Domains\Experience\Services;

use App\Domains\Experience\Models\Experience;
use App\Domains\Experience\Repositories\ExperienceRepository;

class ExperienceService
{
    private ExperienceRepository $experienceRepository;
    public function __construct(ExperienceRepository $experienceRepository)
    {
        $this->experienceRepository = $experienceRepository;
    }

    public function countExperienceOfUser()
    {
        return $this->experienceRepository->countExperienceByUserId();
    }

    public function createExperiences($createExperiencesDto)
    {
        return $this->experienceRepository->createExperience($createExperiencesDto);
    }

    public function updateExperiences(Experience $experiences, $updateExperiencesDto)
    {
        return $this->experienceRepository->updateExperience($experiences, $updateExperiencesDto);
    }

    public function deleteExperiences(Experience $experiences)
    {
        return $this->experienceRepository->deleteExperience($experiences);
    }

    public function changeStatusExperiences($experiencesId, $status)
    {
        return $this->experienceRepository->changeStatusExperience($experiencesId, $status);
    }
}
