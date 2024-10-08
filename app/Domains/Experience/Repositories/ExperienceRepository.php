<?php

namespace App\Domains\Experience\Repositories;

use App\Domains\Experience\Models\Experience;
use Illuminate\Support\Facades\Auth;

class ExperienceRepository
{
    public function countExperienceByUserId()
    {
        return Experience::where('user_id', Auth::id())->count();
    }

    public function createExperience($createExperienceDto)
    {
        return Experience::create($createExperienceDto);
    }

    public function updateExperience(Experience $experience, $updateExperienceDto)
    {
        return $experience->update($updateExperienceDto);
    }

    public function deleteExperience(Experience $experience)
    {
        return $experience->delete();
    }

    public function changeStatusExperience($experienceId, $status)
    {
        $experience = Experience::findOrFail($experienceId);
        $experience->status = $status === 'true' ? 'active' : 'inactive';

        return $experience->save();
    }
}
