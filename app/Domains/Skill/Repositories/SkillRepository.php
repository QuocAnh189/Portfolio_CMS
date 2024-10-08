<?php

namespace App\Domains\Skill\Repositories;

use App\Domains\Skill\Models\Skill;
use Illuminate\Support\Facades\Auth;

class SkillRepository
{
    public function countSkillByUserId()
    {
        return Skill::where('user_id', Auth::id())->count();
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
