<?php

namespace App\Domains\Skill\Repositories;

use App\Domains\Skill\Models\Skill;

class SkillRepository
{
    public function __construct()
    {
        //
    }

    public function createSkill($createSkillDto): Skill
    {
        return Skill::create($createSkillDto);
    }

    public function updateSkill(Skill $skill, $updateSkillDto)
    {
        return $skill->update($updateSkillDto);
    }

    public function deleteSkill(Skill $skill)
    {
        return $skill->delete();
    }

    public function changeStatusSkill($skillId, $status)
    {
        $skill = Skill::findOrFail($skillId);
        $skill->status = $status === 'true' ? 'active' : 'inactive';

        return $skill->save();
    }
}
