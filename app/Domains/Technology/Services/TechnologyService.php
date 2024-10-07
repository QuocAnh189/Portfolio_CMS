<?php

namespace App\Domains\Technology\Services;

use App\Domains\Technology\Models\Technology;
use App\Domains\Technology\Repositories\TechnologyRepository;
use App\Models\Traits\UploadImage;

class TechnologyService
{
    use UploadImage;

    private TechnologyRepository $technologyRepository;
    public function __construct(TechnologyRepository $technologyRepository)
    {
        $this->technologyRepository = $technologyRepository;
    }

    public function createTechnology($createTechnologyDto)
    {
        if (file_exists($createTechnologyDto['image'])) {
            $createTechnologyDto['image'] = $this->uploadImage($createTechnologyDto['image'], 'technology', ['width' => 300, 'height' => 300]);
        }
        return $this->technologyRepository->createTechnology($createTechnologyDto);
    }

    public function updateTechnology($updateTechnologyDto, Technology $technology)
    {
        if (file_exists($updateTechnologyDto['image'])) {
            $updateTechnologyDto['image'] = $this->uploadImage($updateTechnologyDto['image'], 'technology', ['width' => 300, 'height' => 300]);
        }

        return $this->technologyRepository->updateTechnology($updateTechnologyDto, $technology);
    }

    public function deleteTechnology(Technology $technology)
    {
        return $this->technologyRepository->deleteTechnology($technology);
    }

    public function changeStatusTechnology($technologyId, $status)
    {
        return $this->technologyRepository->changeStatusTechnology($technologyId, $status);
    }
}
