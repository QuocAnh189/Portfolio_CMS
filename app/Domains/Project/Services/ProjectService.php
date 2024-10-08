<?php

namespace App\Domains\Project\Services;

use App\Domains\Project\Models\Project;
use App\Domains\Project\Repositories\ProjectRepository;
use App\Models\Traits\UploadImage;

class ProjectService
{
    use UploadImage;
    private ProjectRepository $projectRepository;
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function countProjectOfUser()
    {
        return $this->projectRepository->countProjectOfUser();
    }

    public function getAllProject()
    {
        return $this->projectRepository->findAll();
    }

    public function createProject($createProjectDto)
    {
        if (file_exists($createProjectDto['cover_image'])) {
            $createProjectDto['cover_image'] = $this->uploadImage($createProjectDto['cover_image'], 'project', ['width' => 800, 'height' => 500]);
        }
        return $this->projectRepository->createProject($createProjectDto);
    }

    public function updateProject($updateProjectDto, Project $project)
    {
        if (file_exists($updateProjectDto['cover_image'])) {
            $updateProjectDto['cover_image'] = $this->uploadImage($updateProjectDto['cover_image'], 'project', ['width' => 800, 'height' => 500]);
        }

        return $this->projectRepository->updateProject($updateProjectDto, $project);
    }

    public function deleteProject(Project $project)
    {
        return $this->projectRepository->deleteProject($project);
    }

    public function changeStatusProject($projectId, $status)
    {
        return $this->projectRepository->changeStatusProject($projectId, $status);
    }
}
