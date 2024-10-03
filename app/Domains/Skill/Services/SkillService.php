<?php

namespace App\Domains\Skill\Services;

use App\Domains\Skill\Repositories\SkillRepository;

class SkillService
{
    private SkillRepository $skillRepository;
    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }
}
