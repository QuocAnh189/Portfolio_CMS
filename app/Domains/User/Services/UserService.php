<?php

namespace App\Domains\User\Services;

use App\Domains\Profile\Repositories\ProfileRepository;
use App\Domains\User\Models\User;
use App\Domains\User\Repositories\UserRepository;
use App\Models\Traits\UploadImage;

class UserService
{
    use UploadImage;
    private UserRepository $userRepository;
    private ProfileRepository $profileRepository;
    public function __construct(UserRepository $userRepository, ProfileRepository $profileRepository)
    {
        $this->userRepository = $userRepository;
        $this->profileRepository = $profileRepository;
    }

    public function createUser($createUserDto)
    {
        $user = $this->userRepository->createUser($createUserDto['user']);
        if ($user) {
            $createUserDto['profile']['user_id'] = (string) $user->id;

            if ($createUserDto['profile']['avatar'] !== null) {
                $createUserDto['profile']['avatar'] = $this->uploadImage($createUserDto['profile']['avatar'], 'user');
            }

            $profile = $this->profileRepository->createProfile($createUserDto['profile']);

            return [
                'user' => $user,
                'profile' => $profile,
            ];
        }
    }

    public function updateUser($updateUserDto)
    {
        $user = $this->userRepository->updateUser($updateUserDto['user']);

        if (file_exists($updateUserDto['profile']['avatar'])) {
            $updateUserDto['profile']['avatar'] = $this->uploadImage($updateUserDto['profile']['avatar'], 'user');
        }

        $profile = $this->profileRepository->updateProfile($updateUserDto['profile']);

        return [
            'user' => $user,
            'profile' => $profile,
        ];
    }

    public function deleteUser(User $user)
    {
        return $this->userRepository->deleteUser(user: $user);
    }

    public function changeStatusUser($userId, $status)
    {
        return $this->userRepository->changeStatusUser($userId, $status);
    }
}
