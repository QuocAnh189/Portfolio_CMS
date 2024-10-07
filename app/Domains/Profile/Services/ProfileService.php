<?php

namespace App\Domains\Profile\Services;

use App\Domains\Profile\Models\Profile;
use App\Domains\Profile\Repositories\ProfileRepository;
use App\Domains\RoleSoftware\Repositories\RoleSoftwareRepository;
use App\Domains\User\Repositories\UserRepository;
use App\Models\Traits\UploadImage;

class ProfileService
{
    use UploadImage;
    private ProfileRepository $profileRepository;
    private UserRepository $userRepository;

    private RoleSoftwareRepository $roleSoftwareRepository;
    public function __construct(ProfileRepository $profileRepository, UserRepository $userRepository, RoleSoftwareRepository $roleSoftwareRepository)
    {
        $this->profileRepository = $profileRepository;
        $this->userRepository = $userRepository;
        $this->roleSoftwareRepository = $roleSoftwareRepository;
    }

    public function getProfileByUserId($userId)
    {
        $profile = $this->profileRepository->findProfileByUserId($userId);

        return $profile;
    }

    public function updateProfile($updateProfileDto)
    {

        $user = $this->userRepository->updateUser($updateProfileDto['user']);

        if (file_exists($updateProfileDto['upload'])) {
            $updateProfileDto['avatar'] = $this->uploadImage($updateProfileDto['upload'], 'user', ['width' => 300, 'height' => 300]);
        }

        $profile = $this->profileRepository->updateProfile($updateProfileDto);

        return [
            'user' => $user,
            'profile' => $profile,
        ];
    }

    public function updatePassword($updatePasswordDto)
    {
        return $this->profileRepository->updatePassword($updatePasswordDto);
    }

    public function deleteProfile(Profile $profile)
    {
        return $this->profileRepository->deleteProfile($profile);
    }

    public function changeStatusProfileByUserId($userId, $status)
    {
        return $this->profileRepository->changeStatusProfileByUserId($userId, $status);
    }
}
