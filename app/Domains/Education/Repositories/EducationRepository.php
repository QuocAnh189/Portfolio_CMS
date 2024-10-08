<?php

namespace App\Domains\Education\Repositories;

use App\Domains\Education\Models\Education;
use Illuminate\Support\Facades\Auth;

class EducationRepository
{
    public function countEducationByUserId()
    {
        return Education::where('user_id', Auth::id())->count();
    }

    public function createEducation($createEducationDto)
    {
        return Education::create($createEducationDto);
    }

    public function updateEducation(Education $education, $updateEducationDto)
    {
        return $education->update($updateEducationDto);
    }

    public function deleteEducation(Education $education)
    {
        return $education->delete();
    }

    public function changeStatusEducation($educationId, $status)
    {
        $education = Education::findOrFail($educationId);
        $education->status = $status === 'true' ? 'active' : 'inactive';

        return $education->save();
    }
}
