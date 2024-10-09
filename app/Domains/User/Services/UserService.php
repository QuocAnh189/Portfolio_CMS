<?php

namespace App\Domains\User\Services;

use App\Domains\Profile\Repositories\ProfileRepository;
use App\Domains\User\Models\User;
use App\Domains\User\Repositories\UserRepository;
use App\Models\Traits\UploadImage;
use Illuminate\Support\Facades\Hash;

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

    public function countUsers()
    {
        return $this->userRepository->countOfUser();
    }

    public function getAllUser(): mixed
    {
        return $this->userRepository->findAll();
    }

    public function createUser($createUserDto)
    {
        $password = Hash::make($createUserDto['user']['password']);
        $user = $this->userRepository->create([...$createUserDto['user'], 'password' => $password]);

        if ($user) {
            $createUserDto['profile']['user_id'] = (string) $user->id;

            if (file_exists($createUserDto['profile']['avatar'])) {
                $createUserDto['profile']['avatar'] = $this->uploadImage($createUserDto['profile']['avatar'], 'user', ['width' => 300, 'height' => 300]);
            }

            $profile = $this->profileRepository->create($createUserDto['profile']);

            return [
                'user' => $user,
                'profile' => $profile,
            ];
        }
    }

    public function updateUser($updateUserDto)
    {
        $user = $this->userRepository->update($updateUserDto['user']['id'], $updateUserDto['user']);

        if (file_exists($updateUserDto['profile']['avatar'])) {
            $updateUserDto['profile']['avatar'] = $this->uploadImage($updateUserDto['profile']['avatar'], 'user', ['width' => 300, 'height' => 300]);
        }

        $profile = $this->profileRepository->update($updateUserDto['profile']['id'], $updateUserDto['profile']);

        return [
            'user' => $user,
            'profile' => $profile,
        ];
    }

    public function deleteUser(User $user)
    {
        return $this->userRepository->delete($user->id);
    }

    public function changeStatusUser($userId, $status)
    {
        return $this->userRepository->changeStatus($userId, $status);
    }
}
