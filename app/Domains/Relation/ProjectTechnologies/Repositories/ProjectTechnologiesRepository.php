<?php

namespace App\Domains\Relation\ProjectTechnologies\Repositories;

use App\Domains\Relation\ProjectTechnologies\Models\ProjectTechnologies;

class ProjectTechnologiesRepository
{
    public function __construct()
    {
        //
    }

    public function findAll()
    {
        return ProjectTechnologies::where('status', 'active')->get();
    }

    public function findProjectTechnologiesByProjectIdAndTechnologyId($projectId, $technologyId)
    {
        return ProjectTechnologies::where('project_id', $projectId)->where('technology_id', $technologyId)->first();
    }

    public function createProjectTechnologies($createProjectTechnologiesDto)
    {
        return ProjectTechnologies::create($createProjectTechnologiesDto);
    }

    public function updateProjectTechnologies($updateProjectTechnologiesDto, ProjectTechnologies $projectTecProjectTechnologies)
    {
        return $projectTecProjectTechnologies->update($updateProjectTechnologiesDto);
    }

    public function deleteProjectTechnologies(ProjectTechnologies $projectTecProjectTechnologies)
    {
        return $projectTecProjectTechnologies->delete();
    }

    public function changeStatusProjectTechnologies($projectTecProjectTechnologiesId, $status)
    {
        $projectTecProjectTechnologies = ProjectTechnologies::findOrFail($projectTecProjectTechnologiesId);
        $projectTecProjectTechnologies->status = $status === 'true' ? 'active' : 'inactive';

        return $projectTecProjectTechnologies->save();
    }
}
