<?php

namespace App\Domains\Relation\ProjectTechnologies\Repositories;

use App\Domains\Relation\ProjectTechnologies\Models\ProjectTechnologies;
use App\Repository\Eloquent\BaseRepository;

class ProjectTechnologiesRepository extends BaseRepository
{
    public function model()
    {
        return ProjectTechnologies::class;
    }

    public function findProjectTechnologiesByProjectIdAndTechnologyId($projectId, $technologyId)
    {
        return ProjectTechnologies::where('project_id', $projectId)->where('technology_id', $technologyId)->first();
    }
}
