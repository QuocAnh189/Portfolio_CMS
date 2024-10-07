<?php

namespace App\Domains\ProjectGallery\Repositories;

use App\Domains\ProjectGallery\Models\ProjectGallery;

class ProjectGalleryRepository
{
    public function __construct()
    {
        //
    }

    public function findAll()
    {
        return ProjectGallery::where('status', 'active')->get();
    }

    public function createProjectGallery($createProjectGalleryDto): ProjectGallery
    {
        return ProjectGallery::create($createProjectGalleryDto);
    }

    public function deleteProjectGallery(ProjectGallery $projectGalleryProjectGallery)
    {
        return $projectGalleryProjectGallery->delete();
    }

    public function changeStatusProjectGallery($projectGalleryProjectGalleryId, $status)
    {
        $projectGalleryProjectGallery = ProjectGallery::findOrFail($projectGalleryProjectGalleryId);
        $projectGalleryProjectGallery->status = $status === 'true' ? 'active' : 'inactive';

        return $projectGalleryProjectGallery->save();
    }
}
