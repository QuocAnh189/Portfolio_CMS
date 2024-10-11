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

    public function countAllProject()
    {
        return $this->projectRepository->countAll();
    }

    public function countProjectOfUser()
    {
        return $this->projectRepository->countOfUser();
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
        return $this->projectRepository->create($createProjectDto);
    }

    public function updateProject($updateProjectDto, Project $project)
    {
        if (file_exists($updateProjectDto['cover_image'])) {
            $updateProjectDto['cover_image'] = $this->uploadImage($updateProjectDto['cover_image'], 'project', ['width' => 800, 'height' => 500]);
        }

        return $this->projectRepository->update($project->id, $updateProjectDto);
    }

    public function deleteProject(Project $project)
    {
        return $this->projectRepository->delete($project->id);
    }

    public function restoreProject(Project $project)
    {
        return $this->projectRepository->restore($project);
    }
    public function removeProject(Project $project)
    {
        return $this->projectRepository->forceDelete($project);
    }

    public function changeStatusProject($projectId, $status)
    {
        return $this->projectRepository->changeStatus($projectId, $status);
    }
}
