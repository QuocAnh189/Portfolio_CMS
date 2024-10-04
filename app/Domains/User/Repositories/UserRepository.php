<?php

namespace App\Domains\User\Repositories;

use App\Domains\User\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function __construct()
    {
        //
    }

    public function createUser($createUserDto)
    {
        $user = User::create([...$createUserDto, 'password' => Hash::make($createUserDto['password'])]);

        return $user;
    }

    public function deleteUser(User $user)
    {
        return $user->delete();
    }

    public function updateUser($userDto)
    {
        $user = User::find($userDto['id']);
        return $user->update($userDto);
    }

    public function changeStatusUser($userId, $status)
    {
        $user = User::findOrFail($userId);
        $user->status = $status === 'true' ? 'active' : 'inactive';

        return $user->save();
    }
}
