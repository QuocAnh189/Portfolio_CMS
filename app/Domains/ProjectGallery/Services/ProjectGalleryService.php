<?php

namespace App\Domains\ProjectGallery\Services;

use App\Domains\ProjectGallery\Models\ProjectGallery;
use App\Domains\ProjectGallery\Repositories\ProjectGalleryRepository;
use App\Models\Traits\UploadImage;

class ProjectGalleryService
{
    use UploadImage;
    private ProjectGalleryRepository $projectGalleryRepository;
    public function __construct(ProjectGalleryRepository $projectGalleryRepository)
    {
        $this->projectGalleryRepository = $projectGalleryRepository;
    }

    public function countGalleryOfUser()
    {
        return $this->projectGalleryRepository->countGalleryOfUser();
    }

    public function getAllProjectGallery()
    {
        return $this->projectGalleryRepository->findAll();
    }

    public function createProjectGallery($createProjectGalleryDto)
    {
        if (file_exists($createProjectGalleryDto['image'])) {
            $createProjectGalleryDto['image'] = $this->uploadImage($createProjectGalleryDto['image'], 'project-gallery', ['width' => 800, 'height' => 500]);
        }

        return $this->projectGalleryRepository->createProjectGallery($createProjectGalleryDto);
    }

    public function deleteProjectGallery(ProjectGallery $projectGallery)
    {
        return $this->projectGalleryRepository->deleteProjectGallery($projectGallery);
    }

    public function changeStatusProjectGallery($projectGalleryId, $status)
    {
        return $this->projectGalleryRepository->changeStatusProjectGallery($projectGalleryId, $status);
    }
}
