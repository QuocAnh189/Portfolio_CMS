<?php

namespace App\Domains\Relation\ProjectTechnologies\Services;

use App\Domains\Relation\ProjectTechnologies\Models\ProjectTechnologies;
use App\Domains\Relation\ProjectTechnologies\Repositories\ProjectTechnologiesRepository;

class ProjectTechnologiesService
{
    private ProjectTechnologiesRepository $projectTechnologiesRepository;
    public function __construct(ProjectTechnologiesRepository $projectTechnologiesRepository)
    {
        $this->projectTechnologiesRepository = $projectTechnologiesRepository;
    }

    public function getAllProjectTechnologies()
    {
        return $this->projectTechnologiesRepository->findAll();
    }

    public function checkExistsProjectTechnologies($projectId, $technologyId)
    {
        return $this->projectTechnologiesRepository->findProjectTechnologiesByProjectIdAndTechnologyId($projectId, $technologyId);
    }

    public function createProjectTechnologies($createProjectTechnologiesDto)
    {
        return $this->projectTechnologiesRepository->create($createProjectTechnologiesDto);
    }

    public function updateProjectTechnologies(ProjectTechnologies $projectTechnologies, $updateProjectTechnologiesDto)
    {
        return $this->projectTechnologiesRepository->update($projectTechnologies->id, $updateProjectTechnologiesDto);
    }

    public function deleteProjectTechnologies(ProjectTechnologies $projectTechnologies)
    {
        return $this->projectTechnologiesRepository->delete($projectTechnologies->id);
    }

    public function changeStatusProjectTechnologies($projectTechnologiesId, $status)
    {
        return $this->projectTechnologiesRepository->changeStatus($projectTechnologiesId, $status);
    }
}
