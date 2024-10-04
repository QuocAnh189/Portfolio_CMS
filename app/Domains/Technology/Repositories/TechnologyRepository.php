<?php

namespace App\Domains\Technology\Repositories;

use App\Domains\Technology\Models\Technology;

class TechnologyRepository
{
    public function __construct()
    {
        //
    }

    public function createTechnology($createTechnologyDto): Technology
    {
        return Technology::create($createTechnologyDto);
    }

    public function updateTechnology($updateTechnologyDto, Technology $technology)
    {
        return $technology->update($updateTechnologyDto);
    }

    public function deleteTechnology(Technology $technology)
    {
        return $technology->delete();
    }

    public function changeStatusTechnology($technologyId, $status)
    {
        $technology = Technology::findOrFail($technologyId);
        $technology->status = $status === 'true' ? 'active' : 'inactive';

        return $technology->save();
    }
}
