<?php

namespace App\Domains\Major\Services;

use App\Domains\Major\Models\Major;
use App\Domains\Major\Repositories\MajorRepository;
use App\Models\Traits\UploadImage;

class MajorService
{
    use UploadImage;
    private MajorRepository $majorRepository;
    public function __construct(MajorRepository $majorRepository)
    {
        $this->majorRepository = $majorRepository;
    }

    public function countAllMajor()
    {
        return $this->majorRepository->countAll();
    }

    public function getAllMajor()
    {
        return $this->majorRepository->findAll();
    }

    public function createMajor($createMajorDto)
    {
        if (file_exists($createMajorDto['image'])) {
            $createMajorDto['image'] = $this->uploadImage($createMajorDto['image'], 'major', ['width' => 300, 'height' => 300]);
        }
        return $this->majorRepository->create($createMajorDto);
    }

    public function updateMajor($updateMajorDto, Major $major)
    {
        if (file_exists($updateMajorDto['image'])) {
            $updateMajorDto['image'] = $this->uploadImage($updateMajorDto['image'], 'major', ['width' => 300, 'height' => 300]);
        }

        return $this->majorRepository->update($major->id, $updateMajorDto);
    }

    public function deleteMajor(Major $major)
    {
        return $this->majorRepository->delete($major->id);
    }

    public function changeStatusMajor($majorId, $status)
    {
        return $this->majorRepository->changeStatus($majorId, $status);
    }
}
