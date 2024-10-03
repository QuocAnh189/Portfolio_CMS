<?php

namespace App\Domains\Experience\Services;

use App\Domains\Experience\Repositories\ExperienceRepository;

class ExperienceService
{
    private ExperienceRepository $experienceRepository;
    public function __construct(ExperienceRepository $experienceRepository)
    {
        $this->experienceRepository = $experienceRepository;
    }
}
