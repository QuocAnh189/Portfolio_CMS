<?php

namespace App\Domains\Project\Repositories;

use App\Domains\Project\Models\Project;

class ProjectRepository
{
    public function __construct()
    {
        //
    }

    public function findAll()
    {
        return Project::where('status', 'active')->get();
    }

    public function createProject($createProjectDto): Project
    {
        return Project::create($createProjectDto);
    }

    public function updateProject($updateProjectDto, Project $project)
    {
        return $project->update($updateProjectDto);
    }

    public function deleteProject(Project $project)
    {
        return $project->delete();
    }

    public function changeStatusProject($projectId, $status)
    {
        $project = Project::findOrFail($projectId);
        $project->status = $status === 'true' ? 'active' : 'inactive';

        return $project->save();
    }
}
