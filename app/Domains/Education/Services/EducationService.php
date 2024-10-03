<?php

namespace App\Domains\Education\Services;

use App\Domains\Education\Repositories\EducationRepository;


class EducationService
{
    private EducationRepository $educationRepository;
    public function __construct(EducationRepository $educationRepository)
    {
        $this->educationRepository = $educationRepository;
    }
}
