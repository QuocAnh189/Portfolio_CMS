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
        return $this->profileRepository->findProfileByUserId($userId);
    }

    public function updateProfile($updateProfileDto)
    {
        $user = $this->userRepository->update($updateProfileDto['user']['id'], $updateProfileDto['user']);

        if (file_exists($updateProfileDto['upload'])) {
            $updateProfileDto['avatar'] = $this->uploadImage($updateProfileDto['upload'], 'user', ['width' => 300, 'height' => 300]);
        }

        $profile = $this->profileRepository->update($updateProfileDto['id'], $updateProfileDto);

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
        return $this->profileRepository->delete($profile->id);
    }

    public function restoreProfile(Profile $profile)
    {
        return $this->profileRepository->restore($profile);
    }
    public function removeProfile(Profile $profile)
    {
        return $this->profileRepository->forceDelete($profile);
    }

    public function changeStatusProfile($profileId, $status)
    {
        return $this->profileRepository->changeStatus($profileId, $status);
    }
}
