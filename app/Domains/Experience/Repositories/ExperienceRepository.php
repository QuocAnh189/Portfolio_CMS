<?php

namespace App\Domains\Experience\Repositories;

use App\Domains\Experience\Models\Experience;

class ExperienceRepository
{
    public function __construct()
    {
        //
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
