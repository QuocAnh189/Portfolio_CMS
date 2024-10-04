<?php

namespace App\Domains\Major\Repositories;

use App\Domains\Major\Models\Major;

class MajorRepository
{
    public function __construct()
    {
        //
    }

    public function createMajor($createMajorDto): Major
    {
        return Major::create($createMajorDto);
    }

    public function updateMajor($updateMajorDto, Major $major)
    {
        return $major->update($updateMajorDto);
    }

    public function deleteMajor(Major $major)
    {
        return $major->delete();
    }

    public function changeStatusMajor($majorId, $status)
    {
        $major = Major::findOrFail($majorId);
        $major->status = $status === 'true' ? 'active' : 'inactive';

        return $major->save();
    }
}
