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
        return $this->experienceRepository->countOfUser();
    }

    public function createExperiences($createExperiencesDto)
    {
        return $this->experienceRepository->create($createExperiencesDto);
    }

    public function updateExperiences(Experience $experiences, $updateExperiencesDto)
    {
        return $this->experienceRepository->update($experiences->id, $updateExperiencesDto);
    }

    public function deleteExperiences(Experience $experiences)
    {
        return $this->experienceRepository->delete($experiences->id);
    }

    public function changeStatusExperiences($experiencesId, $status)
    {
        return $this->experienceRepository->changeStatus($experiencesId, $status);
    }
}
