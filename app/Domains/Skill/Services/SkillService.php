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

    public function countAllSkill()
    {
        return $this->skillRepository->countAll();
    }

    public function countSkillOfUser()
    {
        return $this->skillRepository->countSkillByUserId();
    }

    public function createSkill($createSkillDto)
    {
        return $this->skillRepository->create($createSkillDto);
    }

    public function updateSkill(Skill $skill,  $updateSkillDto)
    {
        return $this->skillRepository->update($skill->id, $updateSkillDto);
    }

    public function deleteSkill(Skill $skill)
    {
        return $this->skillRepository->delete($skill->id);
    }

    public function changeStatusSkill($skillId, $status)
    {
        return $this->skillRepository->changeStatus($skillId, $status);
    }
}
