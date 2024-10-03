<?php

namespace App\Domains\ProjectGallery\Services;

use App\Domains\ProjectGallery\Repositories\ProjectGalleryRepository;

class ProjectGalleryService
{
    private ProjectGalleryRepository $projectGalleryRepository;
    public function __construct(ProjectGalleryRepository $projectGalleryRepository)
    {
        $this->projectGalleryRepository = $projectGalleryRepository;
    }
}
