<?php

namespace App\Domains\Profile\Services;

use App\Domains\Profile\Repositories\ProfileRepository;
use App\Domains\RoleSoftware\Repositories\RoleSoftwareRepository;
use App\Models\Traits\UploadImage;

class ProfileService
{
    use UploadImage;
    private ProfileRepository $profileRepository;
    private RoleSoftwareRepository $roleSoftwareRepository;
    public function __construct(ProfileRepository $profileRepository, RoleSoftwareRepository $roleSoftwareRepository)
    {
        $this->profileRepository = $profileRepository;
        $this->roleSoftwareRepository = $roleSoftwareRepository;
    }

    public function getProfile($userId)
    {
        try {
            $profile = $this->profileRepository->findProfileByUserId($userId);
            $role_softwares = $this->roleSoftwareRepository->findAll();

            return [
                'profile' => $profile,
                'role_softwares' => $role_softwares,
            ];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function updateProfile($updateProfileDto)
    {
        try {
            if ($updateProfileDto['upload'] !== null) {
                $updateProfileDto['avatar'] = $this->uploadImage($updateProfileDto['upload'], 'user');
            }

            return $this->profileRepository->updateProfile($updateProfileDto);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function updatePassword($updatePasswordDto)
    {
        try {
            return $this->profileRepository->updatePassword($updatePasswordDto);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
