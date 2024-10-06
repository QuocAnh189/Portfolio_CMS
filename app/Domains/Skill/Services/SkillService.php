<?php

namespace App\Domains\Skill\Services;

use App\Domains\Skill\Repositories\SkillRepository;
use App\Domains\Skill\Models\Skill;
use App\Models\Traits\UploadImage;

class SkillService
{
    use UploadImage;
    private SkillRepository $skillRepository;
    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function createSkill($createSkillDto)
    {
        return $this->skillRepository->createSkill($createSkillDto);
    }

    public function updateSkill(Skill $skill,  $updateSkillDto)
    {
        return $this->skillRepository->updateSkill($skill, $updateSkillDto,);
    }

    public function deleteSkill(Skill $skill)
    {
        return $this->skillRepository->deleteSkill($skill);
    }

    public function changeStatusSkill($skillId, $status)
    {
        return $this->skillRepository->changeStatusSkill($skillId, $status);
    }
}
