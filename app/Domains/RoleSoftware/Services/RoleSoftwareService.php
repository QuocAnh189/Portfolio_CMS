<?php

namespace App\Domains\RoleSoftware\Services;

use App\Domains\RoleSoftware\Models\RoleSoftware;
use App\Domains\RoleSoftware\Repositories\RoleSoftwareRepository;
use App\Models\Traits\UploadImage;

class RoleSoftwareService
{
    use UploadImage;

    private RoleSoftwareRepository $roleSoftwareRepository;

    public function __construct(RoleSoftwareRepository $roleSoftwareRepository)
    {
        $this->roleSoftwareRepository = $roleSoftwareRepository;
    }

    public function createRoleSoftware($createRoleSoftwareDto)
    {
        if ($createRoleSoftwareDto['image'] !== null) {
            $createRoleSoftwareDto['image'] = $this->uploadImage($createRoleSoftwareDto['image'], 'role-software');
        }
        return $this->roleSoftwareRepository->createRoleSoftware($createRoleSoftwareDto);
    }

    public function updateRoleSoftware($updateRoleSoftwareDto, RoleSoftware $roleSoftware)
    {
        if (file_exists($updateRoleSoftwareDto['image'])) {
            $updateRoleSoftwareDto['image'] = $this->uploadImage($updateRoleSoftwareDto['image'], 'role-software');
        }

        return $this->roleSoftwareRepository->updateRoleSoftware($updateRoleSoftwareDto, $roleSoftware);
    }

    public function deleteRoleSoftware(RoleSoftware $roleSoftware)
    {
        return $this->roleSoftwareRepository->deleteRoleSoftware($roleSoftware);
    }

    public function changeStatusRoleSoftware($roleSoftwareId, $status)
    {
        return $this->roleSoftwareRepository->changeStatusRoleSoftware($roleSoftwareId, $status);
    }
}
