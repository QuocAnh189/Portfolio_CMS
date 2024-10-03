<?php

namespace App\Domains\Profile\Services;

use App\Domains\Profile\Repositories\ProfileRepository;
use App\Models\Traits\UploadImage;

class ProfileService
{
    use UploadImage;
    private ProfileRepository $profileRepository;
    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function getProfile($userId)
    {
        try {
            return $this->profileRepository->findProfileByUserId($userId);
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
