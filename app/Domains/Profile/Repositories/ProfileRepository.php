<?php

namespace App\Domains\Profile\Repositories;

use App\Domains\Profile\Models\Profile;
use App\Domains\User\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileRepository
{

    public function findProfileByUserId($id)
    {
        return Profile::with('user')->where('user_id', $id)->first();
    }

    public function updateProfile($dataDto)
    {
        $profile = Profile::find($dataDto['id']);
        $profile->update($dataDto);
        $profile->user->update([
            'name' => $dataDto['user']['name'],
            'email' => $dataDto['user']['email']
        ]);
        return $profile;
    }

    public function updatePassword($dataDto)
    {
        $user = User::find($dataDto['user_id']);
        $user->update([
            'password' => Hash::make($dataDto['new_password'])
        ]);
        return $user;
    }
}
