<?php

namespace App\Domains\Project\Services;

use App\Domains\Project\Repositories\ProjectRepository;

class ProjectService
{
    private ProjectRepository $projectRepository;
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }
}
