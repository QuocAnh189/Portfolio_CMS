<?php

namespace App\Domains\Education\Services;

use App\Domains\Education\Models\Education;
use App\Domains\Education\Repositories\EducationRepository;
use App\Models\Traits\UploadImage;


class EducationService
{
    use UploadImage;
    private EducationRepository $educationRepository;
    public function __construct(EducationRepository $educationRepository)
    {
        $this->educationRepository = $educationRepository;
    }

    public function countEducationOfUser()
    {
        return $this->educationRepository->countOfUser();
    }

    public function createEducation($createEducationDto)
    {
        if (file_exists(filename: $createEducationDto['logo'])) {
            $createEducationDto['logo'] = $this->uploadImage($createEducationDto['logo'], 'education', ['width' => 300, 'height' => 300]);
        }

        return $this->educationRepository->create($createEducationDto);
    }

    public function updateEducation(Education $education, $updateEducationDto)
    {
        if (file_exists(filename: $updateEducationDto['logo'])) {
            $updateEducationDto['logo'] = $this->uploadImage($updateEducationDto['logo'], 'education', ['width' => 300, 'height' => 300]);
        }

        return $this->educationRepository->update($education->id, $updateEducationDto);
    }

    public function deleteEducation(Education $education)
    {
        return $this->educationRepository->delete($education->id);
    }

    public function changeStatusEducation($educationId, $status)
    {
        return $this->educationRepository->changeStatus($educationId, $status);
    }
}
